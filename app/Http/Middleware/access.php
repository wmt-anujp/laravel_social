<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->exists('logged')) {
            return redirect()->route('dashboard');
        } else {
            return $next($request);
        }
    }
}
