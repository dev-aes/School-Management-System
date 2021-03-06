<?php

namespace App\Http\Middleware;

use Closure;

class isParent
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
        if(!$request->user()->hasRole('parent')) {
            abort(404);
        }
        return $next($request);
    }
}
