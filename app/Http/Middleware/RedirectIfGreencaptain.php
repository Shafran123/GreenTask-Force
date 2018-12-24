<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfGreencaptain
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'greencaptain')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('greencaptain/home');
	    }

	    return $next($request);
	}
}