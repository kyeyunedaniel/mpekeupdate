<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Produce;
use \Cache;
use \Log;

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
        
        return view('farmer.profile', compact('user'));
    }

         public function forecast(){
            
            $url='https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
            $data=file_get_contents($url);
            //file_put_contents($cache_file, $data);
            $data=json_decode($data);
            $current=$data->results->current[0];
            $forecast=$data->results->seven_day_forecast;
            // dd($forecast,$current);
            
            return view('farmer.Forecast',compact('forecast','current'));//,['forecast'=>$forecast]
        }
        public function predict(){
            $location = 'kampala';

            $queryString = http_build_query([
              'access_key' => 'de8224e45fcc9d6646ab1b0bc6a4d27a',
              'query' => $location,
            ]);

            $ch = curl_init(sprintf('%s?%s', 'https://api.weatherstack.com/current', $queryString));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $json = curl_exec($ch);
            curl_close($ch);

            $api_result = json_decode($json, true);
            
            return view('farmer.predict',compact('api_result','location'));
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

        if($request->has("photo")){
            $photo = request()->file('photo');
            $imageName = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $user->photo = 'photos/'.$imageName;
        }
        $user->update();
        return back()->with("success", __('page.updated_successfully'));
    }
     public function profile_pass(Request $request){
        $user = Auth::user();
        
        return view('farmer.change_password', compact('user'));
    }

      public function change_user(Request $request){
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
            return back()->with("error",'password does not match');
        }
    }

    public function index()
    {
        //
        return view('farmer.index');
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

    public function warehouse(){
        $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($ware_house,$ware_hous);
        return view('farmer.house',compact('countries','ware_house','ware_hous'));
    }

    public function inventory(){
        $farmer=DB::table('users')->get();
         $countries=DB::table('warehouses')->get();
          $produce=DB::table('produces')->where(['user_id'=>Auth::user()->id])->get();
         $Grain=DB::table('warehouses')->distinct()->get();
        return view('farmer.inventory',compact('countries','farmer','Grain','produce'));
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
         $employee = Produce::findOrFail($id);
         $Grain=DB::table('warehouses')->distinct()->get();
         $countries=DB::table('warehouses')->get();
        //  $this->setPageTitle('Employee', 'Edit Employee');
        return view('farmer.edit', compact('employee','Grain','countries'));
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
        //'Unit' => $request->get('Unit'),
                   
            $employee = $request->validate([

            'quantity'      =>  'required|max:191',
            'Status'     =>  'required|max:191',
            'Delivery'  =>  'required|max:191',
            
            
            ]);
       Produce::whereId($id)->update($employee);

        // return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
        return $this->responseRedirect('farmer.inventory', 'Data updated successfully' ,'success',false, false);
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
