<?php

namespace App\Arrival\Http\Middleware;

Use Closure;
use Illuminate\Support\Facades\Auth;

class ArrivalMiddleware 
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            return $next($request);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}