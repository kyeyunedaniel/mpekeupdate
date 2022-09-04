<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\Processor;

class ProcessorController extends Controller
{
    //

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
        
        return view('processor.profile', compact('user'));
    }

     public function profile_pass(Request $request){
        $user = Auth::user();
        
        return view('transportor.change_password', compact('user'));
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
            return back()->with("error",'password does not match');
        }
    }

    public function index()
    {
        // 
         return view('processor.processor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
         $categories =DB::table('warehouses')->get();
        $products=DB::table('processors')->where('user_id',Auth::user()->id)->get();
        return view('processor.index',compact('products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());

             if($request->has("image")){
                $photo = $request->file('image');
                $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension(); 
                $photo->move(public_path('photos'), $imageName);
                $photoPath = 'photos/'.$imageName;           
            
               }

             // dd($photoPath);
               // $rocessor = new Processor
               Processor::create([
                    'name' => $request->name,
                    'category' =>$request->Category,
                    'Location' =>$request->Location,
                    'description' =>$request->action,
                    'user_id' =>Auth::user()->id,
                    'image'  =>'photos/'.$imageName
                ]);
                

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
