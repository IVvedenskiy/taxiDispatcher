<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Dispatcher
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
        if (Auth::check() && Auth::user()->isDispatcher() == true) {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->isAdmin() == 'admin') {
            return redirect('/admin');
        }
        return redirect('/');
    }
}
