<?php

namespace App\Http\Middleware;

use Closure;

class CekLoginPengelola
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

        if (session('level') == NULL OR session('id') == NULL) {
            return redirect()->route('login_pengelola');
        }

        return $next($request);
    }
}
