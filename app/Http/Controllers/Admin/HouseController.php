<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Redirect,Response,File;
use App\Models\Country;
use App\Models\User;
use App\Models\City;
use App\Models\Warehouse;
use Auth;

class HouseController extends Controller
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
       $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       $districts=DB::table('districts')->get();
       // dd($ware_house,$ware_hous);
        return view('admin.ware_house.house.index',compact('countries','ware_house','ware_hous','districts'))->withCartd($cartd);

    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return view('admin.create')->withCartd($cartd);
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
                'manager_id'            =>  'required |max:191',
                'charge'          =>  'required |max:191',
                'grain'     =>  'required |max:191',
                'existance'  =>  'required |max:191',
                'village'          =>  'required |max:191',
                'subcounty' =>  'required |max:191',
                // 'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


                // dd($admin);

            if($request->has("logo")){
            $photo = $request->file('logo');
            $imageName = $request->get("name").'.'.time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $photoPath = 'photos/'.$imageName;
            // dd('images/profile_photos/'.$imageName);
        }
                    $emplo = new Warehouse ([
                    'name' => $request->get('Warehouse'),
                    'user_id'=>$request->get('manager_id'),
                    'district' => $request->get('district'),
                    'country' => $request->get('country'),
                    'sub_county' => $request->get('subcounty'),
                    'parish' => $request->get('parish'),
                    'village' => $request->get('village'),
                    'grain_type' => $request->get('grain'),
                    'charges' => $request->get('charge'),
                    'existance' =>$request->get('existance'),
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
         $employee = Warehouse::findOrFail($id);
       $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($ware_house,$ware_hous);
        return view('admin.ware_house.house.edit',compact('countries','employee','ware_house','ware_hous'))->withCartd($cartd);
    }

     public function warehouse_rejected($id)
    {
        //
         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
         $employee = Warehouse::findOrFail($id);
       $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($employee);
        return view('admin.ware_house.house.Reject',compact('countries','employee','ware_house','ware_hous'))->withCartd($cartd);
    }

        public function rejected($id)
    {
        //
         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
         $employee = Warehouse::findOrFail($id);
       $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($ware_house,$ware_hous);
        return view('admin.ware_house.house.Rejected',compact('countries','employee','ware_house','ware_hous'))->withCartd($cartd);
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
        $comp = Warehouse::find($request->id);
        // dd($request->all());

                $comp->status ='1';
        //         $comp->user_id = $request->manager_id;
        //         $comp->district = $request->district;
        //         $comp->country = $request->country;
        //         $comp->sub_county = $request->subcounty;
        //         $comp->parish = $request->parish;
        //         $comp->village = $request->village;
        //         $comp->grain_type = $request->grain;
        //         $comp->charges = $request->charge;
        //         $comp->existance = $request->existance;


        //     if($request->has("logo")){
        //     $photo = $request->file('logo');
        //     $imageName = $request->get("name").'.'.time().'.'.$photo->getClientOriginalExtension();
        //     $photo->move(public_path('photos'), $imageName);
        //     $comp->logo = 'photos/'.$imageName;
        //     // dd('images/profile_photos/'.$imageName);
        // }
        $comp->save();
       return redirect()->route('admin.ware_house.house.index')->with('Warehouse approved successfully' ,'success',false, false);
    }

      public function reject(Request $request)
    {
        //
        $comp = Warehouse::find($request->id);
        // dd($request->all());

                $comp->status ='2';
                 $comp->reason =$request->reason;
            

        $comp->save();
       return redirect()->route('admin.ware_house.house.index')->with('Warehouse rejected successfully' ,'success',false, false);
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
