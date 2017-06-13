<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckSessionCap
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

        if( Auth::check() ) {

            if( !session()->get('caps') ) {

                $this->user = Auth::user()->load('roles');

                $caps = [];
                $roles = [];

                if( count( $this->user->roles ) ) {
                    foreach ( $this->user->roles as $k => $role_array ) {
                        $caps = array_merge( $caps , json_decode($this->user->roles[$k]->caps, true) );
                        $roles[] = $this->user->roles[$k]->id;
                    }
                }

                session()->put( 'caps', $caps );
                session()->put( 'user_roles', array(
                    'role_ids' => $roles,
                    'last_update' => strtotime(date('d-m-Y'))
                ) );

            } else {
                $changed_role_caps = Cache::get( 'changed_role_caps' );
                $user_roles = session()->get( 'user_roles' );

                foreach ( $user_roles['role_ids'] as $k => $role_id ) {

                    if( isset( $changed_role_caps[$role_id] ) ) {

                        if( $user_roles['last_update'] < $changed_role_caps[$role_id]['time'] ) {

                            //session set
                            $this->user = Auth::user()->load('roles');

                            $caps = [];
                            $roles = [];

                            if( count( $this->user->roles ) ) {
                                foreach ( $this->user->roles as $k => $role_array ) {
                                    $caps = array_merge( $caps , json_decode($this->user->roles[$k]->caps, true) );
                                    $roles[] = $this->user->roles[$k]->id;
                                }
                            }

                            session()->put( 'caps', $caps );
                            session()->put( 'user_roles', array(
                                'role_ids' => $roles,
                                'last_update' => strtotime(date('d-m-Y'))
                            ) );
                            // session set ends
                            break;
                        }

                    }

                }
            }
        }
        return $next($request);
    }
}
