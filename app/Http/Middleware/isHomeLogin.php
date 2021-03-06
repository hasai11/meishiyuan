<?php

namespace App\Http\Middleware;

use Closure;

class isHomeLogin
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
        //如果已经登录
        if(session()->get('user')){
            return $next($request);
        }else {
            return redirect('/login')->with('errors', '请登录后重试');
        }

    }
}
