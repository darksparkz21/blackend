<?php

namespace Androidizay\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware
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
        if(Auth::user()->hasRole('SuperAdmin')){
            return $next($request);
        }

        if($request->is('admin/*')){
            if(!Auth::user()->hasRole('SuperAdmin')){
                abort('401');
            }
            else{
                return $next($request);
            }
        }
    }
}
