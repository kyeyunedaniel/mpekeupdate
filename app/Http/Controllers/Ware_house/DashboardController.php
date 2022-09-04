<?php

namespace App\Http\Controllers\Ware_house;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Warehouse;

class DashboardController extends Controller
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
        public function profile(Request $request){
            $user = Auth::user();
            
            return view('ware_house.profile', compact('user'));
        }

         public function forecast(){
            $url='https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
            $data=file_get_contents($url);
            //file_put_contents($cache_file, $data);
            $data=json_decode($data);
            $current=$data->results->current[0];
            $forecast=$data->results->seven_day_forecast;
            // dd($forecast,$current);
            return view('ware_house.Forecast',compact('forecast','current'));
        }

        public function predict(){

            $ramal = 0;
            $akurasi = 0;
            $persen=0;
            
            return view('ware_house.predict',[
            'ramal'=> $ramal,
            'akurasi' => $akurasi,
            'persen'=>$persen
        ]);
        }

        public function updateuser(Request $request){
            // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact' => 'required',
        ]);
        $user = Auth::user();
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->contact = $request->get("contact");
        $user->Country = $request->get("Country");
        $user->name = $request->get("name");
        $user->City = $request->get("City");
        $user->address = $request->get("address");
        $user->NIN = $request->get("NIN");

        if($request->has("photo")){
            $photo = request()->file('photo');
            $imageName = Auth::user()->id.'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $user->photo = 'photos/'.$imageName;
        }

         if($request->has("trading_license")){
            $dl=Auth::user()->id.'.'.'trading_license';
            $photo = request()->file('trading_license');
            $imageName = $dl.'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $user->trading_license = 'photos/'.$imageName;
        }
        
         if($request->has("driving_license")){
            $dl=Auth::user()->id.'.'.'driving_license';
            $photo = request()->file('driving_license');
            $imageName = $dl.'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $user->driving_license = 'photos/'.$imageName;
        }
        $user->update();
        return back()->with("success", __('profile updated_successfully'));
    }
     public function profile_pass(Request $request){
        $user = Auth::user();
        
        return view('ware_house.change_password', compact('user'));
    }

      public function change_user(Request $request){
        // $request->validate([
        //     'password' => 'confirmed',
        // ]);
        // $user = Auth::user();
        
        // if($request->get('password') != ''){
        //     $user->password = Hash::make($request->get('password'));
        // }        
        // $user->update();
        // return back()->with("success", __('Profile updated successfully'));
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        // dd(bcrypt('password'),Hash::make('password'));
        if (Hash::check($request->old_password,auth()->user()->password)) {
            $user = Auth::user();
           $user->password = Hash::make($request->get('password'));
           $user->update();
           Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with("success",'password updated successfully');
            // dd('password match');
        }else{
            return redirect()->route('ware_house.profile')->with("error",'password does not match');
        }
    }

    public function index()
    {
        // 
        return view('ware_house.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Ware_house()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
       $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->where('user_id',Auth::user()->id)->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($ware_house,$ware_hous);
        return view('ware_house.house.index',compact('countries','ware_house','ware_hous'))->withCartd($cartd);
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
        return view('ware_house.house.Reject',compact('countries','employee','ware_house','ware_hous'))->withCartd($cartd);
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
          $employee = Warehouse::findOrFail($id);
          $countries=DB::table('countries')->get();
            return view('ware_house.edit', compact('employee','countries'));
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
    public function destroy($id)
    {
        //
    }
}
