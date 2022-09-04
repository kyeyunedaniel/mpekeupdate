<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard=null)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
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
        // }
            // return route('login');

        return $next($request);
    }
}
