<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);

        }
        if (! auth()->user()->roles->where('name', $role)->first()->exists()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}