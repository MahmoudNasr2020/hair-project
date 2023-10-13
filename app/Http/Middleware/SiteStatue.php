<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SiteStatue
{
    public function handle(Request $request, Closure $next)
    {
        if(setting()->system_status == 'close')
        {
            return redirect()->route('front.status');
        }
        return $next($request);
        
    }
}
