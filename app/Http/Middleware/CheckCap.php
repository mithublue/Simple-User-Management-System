<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;

class CheckCap
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $capgroup1, $cap1 = null, $capgroup2 = null, $cap2 = null )
    {
        if( $capgroup2 ) {
            if( !user_can($capgroup1,$cap1) && !user_can($capgroup2,$cap2) ) {
                return app_notice( 'You do not have permission to access this page');
            }
        } else if ( !$capgroup2 ) {
            if( !user_can($capgroup1,$cap1) ) {
                return app_notice( 'You do not have permission to access this page');
            }
        }

        return $next($request);
    }
}
