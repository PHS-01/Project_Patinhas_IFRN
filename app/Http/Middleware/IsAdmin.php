<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado e se o tipo é 'admin'
        if (auth()->check() && auth()->user()->type === 'admin') {
            return $next($request);
        }

        // Caso contrário, redireciona para a página dashboard
        return redirect()->route('dashboard');
    }
}
