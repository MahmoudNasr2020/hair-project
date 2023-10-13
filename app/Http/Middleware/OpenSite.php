<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OpenSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(setting()->system_status == 'open')
        {
            if(request()->segment(1) == 'siteStatus')
            {
                return redirect()->route('front.home');
            }
            
        }
        return $next($request);
        
    }
}
