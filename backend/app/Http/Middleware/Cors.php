<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Origin' =>  $request->headers->get('origin'),
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Max-Age' => 0,
            'Cross-Origin-Resource-Policy' => 'unsafe-none',
            'Content-Type' => 'application/json',
            'Access-Control-Allow-Headers' => 'content-type,x-xsrf-token,x-requested-with,x-auth-token,origin,authorization,token,cookie,samesite,xsrf-token'
        ];

        if ($request->getMethod() === "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return Response::make('OK', 200, $headers);
        }

        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
