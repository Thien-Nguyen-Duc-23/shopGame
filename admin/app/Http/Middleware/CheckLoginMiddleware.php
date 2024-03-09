<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Factories\AdminFactory;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $repo = AdminFactory::authRepository();
        $check_verify = $repo->checkThrottlesLogin($request);
        if ($check_verify['error']) {
            return redirect()->route('login')->with('fails', $check_verify['message']);
        }
        return $next($request);
    }
}
