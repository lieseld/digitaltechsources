<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdministratorMiddleware
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
        if (Auth::user()->administrator) {
            return $next($request);
        } else {
            abort(503);
        }

        return "";
    }
}
