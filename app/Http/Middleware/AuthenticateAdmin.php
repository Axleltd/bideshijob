<?php

namespace App\Http\Middleware;

use Closure;
use Shinobi;
class AuthenticateAdmin
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
        if (!Shinobi::isRole('admin')) {
            // session()->flash('errMsg', 'Unauthorised');

            return redirect('/login')->with('errMsg');
        }

        return $next($request);
    }
}
