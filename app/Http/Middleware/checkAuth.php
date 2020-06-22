<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkAuth
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


        $response = $next($request);

        // Perform action
        if (!(Auth::check())) {
            return redirect('/login');
        }

        return $response;
    }
}
