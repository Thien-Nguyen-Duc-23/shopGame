<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (Auth::check()) {
                if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin') {
                    return $next($request);
                }
                else {
                    Auth::logout();
                }
            }
        } catch (\Exception $e) {
            report($e);
            if (Auth::check()) {
                Auth::logout();
            }
        }
        return redirect(route('login'));
    }
}
