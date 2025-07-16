<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class User
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
        if(Auth::user()->id_role == 3){
            return $next($request);
        }

        return abort(403);
   
        // return redirect('dashboard')->with('error',"Anda tidak punya akses untuk membuka halaman ini.");
        // return $next($request);
    }
}
