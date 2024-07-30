<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Exibe o formulário de cadastro de usuário.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Processa o cadastro de um novo usuário.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(Request $request)
    {
        // Valida os dados do formulário
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean'
        ]);

        // Cria um novo usuário
        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'is_admin' => $request->has('is_admin'),
        ]);

        // Redireciona para a página de login ou painel do usuário
        return redirect()->route('login')->with('sucess', 'Cadastro realizado com sucesso! Faça login para continuar.');
    }

    /**
     * Exibe o formulário de perfil do usuário.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('pages.user.profile');
    }

    /**
     * Atualiza as informações do perfil do usuário.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Atualização dos dados
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }

        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Método save do Eloquent
        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }
}
