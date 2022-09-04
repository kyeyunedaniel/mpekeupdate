<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
