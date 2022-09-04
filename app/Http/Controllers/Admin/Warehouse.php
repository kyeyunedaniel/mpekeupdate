<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Produce;
use App\Models\User;

class Warehouse extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
        return view('admin.ware_house.index',compact('ware_house'))->withCartd($cartd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $Grain=DB::table('warehouses')->distinct()->get();
         $countries=DB::table('warehouses')->get();
        // $employee = Produce::findOrFail($id);
         $employee = User::findOrFail($id);
         // dd($employee);
         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        
        return view('admin.ware_house.edit',compact('employee','countries','Grain'))->withCartd($cartd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $comp = User::find($request->id);
        // dd($comp);

                $comp->name = $request->fname;
                $comp->email = $request->email;
                $comp->user_type = $request->kind;
                $comp->contact = $request->tagline;
                $comp->username = $request->Username;


            if($request->has("logo")){
            $photo = $request->file('logo');
            $imageName = $request->get("Username").'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $comp->photo = 'photos/'.$imageName;
            // dd('images/profile_photos/'.$imageName);
        }

        $comp->save();
       return redirect()->route('admin.ware_house.index')->with('Data updated successfully' ,'success',false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
