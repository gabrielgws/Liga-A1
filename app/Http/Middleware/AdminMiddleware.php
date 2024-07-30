<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado e é administrador
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Redireciona para a página inicial ou de login se não for admin
        return redirect()->route('login')->with('error', 'Acesso negado. Somente administradores podem acessar esta página.');
    }
}
