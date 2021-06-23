<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Agent_Service_middleware
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
        if($request->session()->get('nomservice')!=='Agent_Service'){
            return redirect('seconnecter');
        }
        return $next($request);
    }
}
