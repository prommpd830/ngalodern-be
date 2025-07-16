<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Editor
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
        if(Auth::user()->id_role == 2){
            return $next($request);
        }
   
        return abort(403);
        // return $next($request);
    }
}
