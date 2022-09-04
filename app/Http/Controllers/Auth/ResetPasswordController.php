<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
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
            
            default:
               return route('ware_house.index');
                break;
        }

        
    }
}
