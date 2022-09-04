<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
