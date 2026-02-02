<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Prelogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Delete all tokens for the authenticated user before logout
        if($request->isMethod('post') && $request->routeIs('logout')){
            $user = $request->user();
            if($user){
                $user->tokens()->delete();
            }
        }
        return $next($request);
    }
}
