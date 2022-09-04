<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\User_type as Middleware;

class User_type
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, String $user_type)
    {
        // $guards = empty($guards) ? [null] : $guards;

        if (!Auth::check()) 
            # code...
            return redirect('/login');
        
        $user=Auth::user();
        if ($user->user_type ==$user_type)
            # code...
            return $next($request);

        // return redirect('/login');

        
    }
}
