<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pendaftar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if(!Auth::check()){
            return route('login');
        }
        else{
            $authen=Auth::user();
            if ($authen->level==$level) {
                return $next($request);
            }
        }
        abort(404);
    }
}
