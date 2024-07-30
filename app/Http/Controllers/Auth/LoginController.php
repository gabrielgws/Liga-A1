<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Exibe o formulário de login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Processa a requisição de login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function login(Request $request)
    {
        // Valida os dados do formulário
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redireciona para o painel ou página inicial

            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin/dashboard')->with('success', 'Bem-vindo, administrador!');
            }

            return redirect()->intended('/dashboard')->with('success', 'Bem-vindo de volta!');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    /**
     * Realiza o logout do usuário
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
