<?php namespace App\Http\Middleware;

use Closure;

/**
 * @author   Liam Symonds <liam@broadcastpanel.com>
 * @version  1.0.0
 * @modified 16/04/2015
 *
 * Handles authentication via Sentry. Checks to see
 * if the user is authenticated and if they aren't
 * they are returned to the login page.
 **/
class SentryAuth {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
            if ( ! \Sentry::check() )
            {
                return redirect('account/login');
            }

            return $next($reqeust);
	}

}
