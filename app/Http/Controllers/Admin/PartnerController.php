<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        // $ware_house=DB::table('users')->where(['user_type'=>'transportor'])->get();
        $products=DB::table('partners')->get();
        return view('admin.partner',compact('products'))->withCartd($cartd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd($request->all());
         if($request->has("logo")){
            $photo = $request->file('logo');
            $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('products_logo'), $imageName);
        }
        $user = Partner::create([
            'name' => $request->name,
            'logo' => 'products_logo/'.$imageName,
        ]);
        return back()->with('Partner details created successfully','success',false, false);
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
    public function edit(Request $request){
        // dd($request->all());
         $products=Partner::findOrFail($request->id);
        $products->name = $request->name;
         

         if($request->has("logo")){
            $photo = $request->file('logo');
            $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('products_logo'), $imageName);
            $products->logo ='products_logo/'.$imageName;
        }

         $products->save();
        return back()->with('success', 'Your edit is saved successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        // dd($request->all());
        $products=Reject_reason::findOrFail($request->id);
        $products->delete();
        
         return back()->with('success', 'You have delete a saved reason');
    }

}
