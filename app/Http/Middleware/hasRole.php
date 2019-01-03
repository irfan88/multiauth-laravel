<?php

namespace App\Http\Middleware;

use Closure;

class hasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        /* user role
        if ($request->user()->role == $role) {
        return $next($request);
        }
        */
        /* user ability */
        if ($request->user()->can('be-'.$role)) {
            return $next($request);
        }
                return redirect('home')
        ->with('message', 'Anda tidak memiliki akses untuk halaman tersebut.');
        // return $next($request);
    }
}
