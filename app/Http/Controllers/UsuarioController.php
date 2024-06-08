<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Exibir formulário de login
    public function showLoginForm()
    {
        return view('autenticacao.login');
    }

    // Processar o login
    public function login(Request $request)
    {
        // Certifique-se de que as credenciais estão corretas
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('senha') // Note que o campo senha é tratado como password
        ];

        // Tente autenticar o usuário
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        // Redirecionar de volta com erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    // Realizar logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('users/index_user', compact('usuarios'));
    }

    public function list()
    {
        $usuarios = Usuario::all();
        return view('users/list_user', compact('usuarios'));
    }


    // CREATE
    public function create()
    {
        return view('users/create_user');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário

        Usuario::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => bcrypt($request->input('senha')),
        ]);

        return redirect()->route('usuarios.list')->with('success', 'Usuário cadastrado com sucesso.');
    }

    // UPDATE
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('users/edit_user', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário

        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => bcrypt($request->input('senha')),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    // DELETE
    public function confirmDelete($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('users/delete_user', compact('usuario'));
    }

     public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso.');
    }

}
