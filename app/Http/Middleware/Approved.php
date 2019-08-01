<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Approved
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
        if (auth()->user() && auth()->user()->approved) { // User is approved
            return $next($request);
        }

        return redirect(route('landing'))->withError(['Unauthorized', 'Only approved members may access this resource.']);
    }
}
