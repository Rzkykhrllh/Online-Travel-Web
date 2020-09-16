<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

// middleware adalah sebuah program yang berfungsi untuk memfilter request
// di laravel middleware adalah sebuah class yang menengahi antara request dan controller 

class isAdmin
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

        if (Auth::user() && Auth::user()->roles=="ADMIN"){
            return $next($request); //kalau admin request diteruskan
        }
        return redirect("/"); //kalau bukan admin, diarahin ke home
    }
}
