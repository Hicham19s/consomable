<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pasdesession
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
        if(!session()->has('pseudo') && !session()->has('password')){
            return redirect('seconnecter');
        }
        return $next($request);
    }
}
