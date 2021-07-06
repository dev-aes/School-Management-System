<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isRegistrar
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
        if($request->user()->hasRole('registrar') || $request->user()->hasRole('admin'))  {
            return $next($request);
        }
        else
        {
            abort(404);
        }
        
    }
}
