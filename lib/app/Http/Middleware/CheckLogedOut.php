<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogedOut
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
        if(Auth::guest()){
            return redirect()->intended('login')->withInput()->with('error','Ban vui long dang nhap de vao duoc he thong nhe!!');;
        }
        return $next($request);
    }
}
