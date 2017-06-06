<?php

namespace App\Http\Middleware;
use App\User;
use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
       
       if(Auth::check()){
            if (Auth::user()->isAdmin()) {

                return $next($request);
            }

       }

       return redirect('/');
        
    }
}
