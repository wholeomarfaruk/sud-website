<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! hash_equals((string) config('services.client.api_key'), (string) $request->header('X-API-KEY'))) {
            abort(401, 'Unauthorized');
        }

        return $next($request);
    }
}
