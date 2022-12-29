<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use MonishKhatri\SecurityHeaders\SecureHeaders;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $headers = (new SecureHeaders(config('security-headers', [])))->headers();

        foreach ($headers as $key => $value) {
            $response->headers->set($key, $value, true);
        }

        return $response;
    }
}
