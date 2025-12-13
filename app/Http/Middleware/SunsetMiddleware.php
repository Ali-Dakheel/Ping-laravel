<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class SunsetMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $date): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $deprecated = now()->gte(Carbon::parse($date)) ? 'true' : 'false';
        $response->headers->set('Sunset', $date, true);
        $response->headers->set('Deprecated', $deprecated);

        return $response;
    }
}
