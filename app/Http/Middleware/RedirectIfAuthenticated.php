<?php

namespace App\Http\Middleware;

use App\Enums\UserRankEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return redirect()->route(UserRankEnum::Admin->id() === Auth::user()->rank_id ? 'admin' : 'home');
        }

        return $next($request);
    }
}
