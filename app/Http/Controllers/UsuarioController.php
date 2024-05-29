<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('users/users/index_user', compact('usuarios'));
    }

    public function list()
    {
        $usuarios = Usuario::all();
        return view('users/users/list_user', compact('usuarios'));
    }


    // CREATE
    public function create()
    {
        return view('users/users/create_user');
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
