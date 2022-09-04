<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Produce;
use Auth;

class MIController extends Controller
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
         $farmer=DB::table('users')->get();
         $countries=DB::table('warehouses')->get();
          $produce=DB::table('produces')->get();
         $Grain=DB::table('warehouses')->distinct()->get();
        return view('admin.MI.index',compact('countries','farmer','Grain','produce'))->withCartd($cartd);
    }

    public function admin()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $admin=DB::table('users')->where(['user_type'=>'admin'])->get();
        return view('admin.admin.index',compact('admin'))->withCartd($cartd);
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
        // dd($request->all());
         $employee =$request->validate([
                'Warehouse'            =>  'required |max:191',
                'grain'     =>  'required |max:191',
                'Unit'  =>  'required |max:191',
                'quantity'          =>  'required |max:191',
                'farmer'=>  'required |max:191',
                'Status'=>  'required |max:191',
                'Delivery'=>  'required |max:191',
                // 'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


                // dd($admin);
                if ($request->file('logo')) {
                    $destinationPath = 'photos/'; // upload path
                    $files=$request->file('logo');
                   $profileImage = $request->get('Warehouse'). "." . $files->getClientOriginalExtension();
                  $photoPath= $files->storeAs('public/photos',$profileImage);
                     // $PHOTO_url=Storage::url($photoPath);
                     // dd($PHOTO_url,$photoPath,$files);

                }
       

                  $emplo = new Produce ([
                    'Warehouse_id' => $request->get('Warehouse'),
                    'user_id'=>$request->get('farmer'),
                    'name' => $request->get('grain'),
                    'price' => $request->get('Unit'),
                    'quantity' => $request->get('quantity'),
                    'Status' => $request->get('Status'),
                    'quality' => $request->get('Quality'),
                    'Delivery' => $request->get('Delivery'),
                    'logo' =>$photoPath
                ]);
                $emplo->save();
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
                return back()->with('Account created successfully' ,'success',false, false)->withCartd($cartd);
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

        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
         $useMpeke = Produce::findOrFail($id);
         $Grain=DB::table('warehouses')->distinct()->get();
        //  $this->setPageTitle('useMpeke', 'Edit useMpeke');
        return view('admin.MI.edit', compact('useMpeke','Grain'))->withCartd($cartd);
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
        $employee = $request->validate([

            'name'      =>  'required|max:191',
            'email'     =>  'required|max:191',
            'password'  =>  'required|max:191',
            'Phone'=>  'required|max:191',
            'Role'      =>  'required|max:191',
            'image'     => 'jpeg,png,jpg,gif,svg|max:2048',
            
            ]);
       Produce::whereId($id)->update($employee);

        // return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
       
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return $this->responseRedirect('admin.MI.index', 'Data updated successfully' ,'success',false, false)->withCartd($cartd);
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
