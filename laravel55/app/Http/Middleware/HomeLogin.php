<?php

namespace App\Http\Middleware;

use Closure;

class HomeLogin
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    public function handle($require,Closure $next)
    {
    	if(!session('key')) {
    		return response()->view('home.login.login');
    	}
    	return $next($request);
    }
}
