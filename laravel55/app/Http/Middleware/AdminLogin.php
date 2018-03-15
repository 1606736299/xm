<?php

namespace App\Http\Middleware;

use Closure;

class Adminlogin
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    public function handle($require,Closure $next)
    {
    	if(!session('key')) {
    		return response()->view('admin/login');
    	}
        // echo 1;
    	return $next($require);
    }
}
