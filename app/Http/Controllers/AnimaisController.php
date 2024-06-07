<?php

namespace App\Http\Controllers;

use App\Models\AnimaisModel;
use Illuminate\Http\Request;

class AnimaisController extends Controller
{
    public function index()
    {
        $animais = AnimaisModel::all();
        return view('animais/animais_index', compact('animais'));
    }
    
    public function list()
    {
        $animais = AnimaisModel::all();
        return view('animais/animais_list', compact('animais'));
    }

    // CREATE
    public function create()
    {
        return view('animais/animais_create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário

        AnimaisModel::create([
            'nome'     => $request->input('nome'),
            'especie'  => $request->input('especie'),
            'status'   => $request->input('status'),
        ]);

        return redirect()->route('animais.list')->with('success', 'Animal Cadastrado com Sucesso!');
    }

    // UPDATE
    public function edit($id)
    {
        $animais = AnimaisModel::findOrFail($id);
        return view('animais/animais_edit', compact('animais'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário

        $animais = AnimaisModel::findOrFail($id);
        $animais->update([
            'nome'     => $request->input('nome'),
            'especie'  => $request->input('especie'),
            'status'   => $request->input('status'),
        ]);

        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso.');
    }

    // DELETE
    public function confirmDelete($id)
    {
        $animais = AnimaisModel::findOrFail($id);
        return view('animais/animais_delete', compact('animais'));
    }

     public function destroy($id)
    {
        $animais = AnimaisModel::findOrFail($id);
        $animais->delete();

        return redirect()->route('animais.index')->with('success', 'Animal Excluído com Sucesso!');
    }

}
