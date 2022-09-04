<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Transporter;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class TransporterController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(Request $request){
        $user = Auth::user();
        
        return view('transportor.profile', compact('user'));
    }

    public function index()
    {
        // 
       
         $ware_house=DB::table('users')->where(['user_type'=>'transporter'])->get();
         // dd($ware_house);
        return view('admin.transportor.index',compact('ware_house'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products=DB::table('transporters')->where('user_id',Auth::user()->id)->get();
        return view('transportor.index',compact('products'));
    }
     public function profile_pass(Request $request){
        $user = Auth::user();
        
        return view('transportor.change_password', compact('user'));
    }

      public function change_user(Request $request){
        // $request->validate([
        //     'password' => 'confirmed',
        // ]);
        $user = Auth::user();
        // dd($request->all());
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
            return back()->with("error",'password does not match');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fullname=$request['fname'].' '.$request['lname'];
        // dd($fullname);

             if($request->has("image")){
                $photo = $request->file('image');
                $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension(); 
                $photo->move(public_path('photos'), $imageName);
                $photoPath = 'photos/'.$imageName;           
            
               }

               

                User::create([
                    'name' => $fullname,
                    'username' =>$request->Username,
                    'contact' =>$request->tagline,
                    'email' =>$request->email,
                    'user_type' =>$request->kind,
                    'password' => Hash::make($request->password),
                    'photo'  =>'photos/'.$imageName
                ]);

             // dd($photoPath);
               // $rocessor = new Processor
               // Transporter::create([
               //      'name' => $request->name,
               //      'category' =>$request->Category,
               //      'Location' =>$request->Location,
               //      'description' =>$request->action,
               //      'user_id' =>Auth::user()->id,
               //      'image'  =>'photos/'.$imageName
               //  ]);
                

                return back();
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
    }
    public function forecast(){
            
            $url='https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
            $data=file_get_contents($url);
            //file_put_contents($cache_file, $data);
            $data=json_decode($data);
            $current=$data->results->current[0];
            $forecast=$data->results->seven_day_forecast;
            // dd($forecast,$current);
            
            return view('transportor.Forecast',compact('forecast','current'));//,['forecast'=>$forecast]
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
