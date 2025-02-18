<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Verifico que usuario esté autentificado y que tenga un rol especifico
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/'); // Redirige a una página de error o la principal
        }

        // Si el usuario tiene el rol adecuado, continuo con la solicitud
        return $next($request);
    }
}
