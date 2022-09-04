<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    protected function redirectTo(){

        $user_type=Auth::user()->user_type;

        switch ($user_type) {
            case 'admin':
                return route('admin.index');
                break;
            case 'buyer':
                return route('buyer.index');
                break;
             case 'farmer':
                return route('farmer.index');
                break;
                case 'transporter':
                return route('transportor.index');
                break;
                case 'processor':
                return route('processor.index');
                break;
            
            default:
               return route('ware_house.index');
                break;
        }

        
    }

    /**
     * Create a new controller instance. rine kensine
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data['fname']);
        
        // dd($fullname);
        // dd($data);
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'Username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'kind' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        
        $fullname=$data['fname'].' '.$data['lname'];
         if($data["image"]){
            $photo = request()->file('image');
            $imageName = rand(2,'9999').'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
        }
        // dd($data,$imageName);

        return User::create([
            'name' => $fullname,
            'username' => $data['Username'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'user_type' => $data['kind'],
            'password' => Hash::make($data['password']),
            'photo'=>'photos/'.$imageName,
        ]);
    }
}
