<?php

namespace App\Http\Controllers;

use App\Models\AnimaisModel;
use App\Models\VacinaModel;
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

        return redirect()->route('dashboard')->with('success', 'Animal cadastrado com Sucesso!');
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

        return redirect()->route('dashboard')->with('success', 'Animal atualizado com sucesso.');
    }

    // DELETE
    public function confirmDelete($id)
    {
        $animais = AnimaisModel::findOrFail($id);
        return view('animais/animais_delete', compact('animais'));
    }

    public function destroy($id)
    {
        // Encontre o animal pelo ID
        $animal = AnimaisModel::findOrFail($id);
    
        // Delete as vacinas associadas ao animal
        VacinaModel::where('id_animal', $id)->delete();
    
        // Delete o animal
        $animal->delete();
    
        return redirect()->route('dashboard')->with('success', 'Animal excluído com sucesso!');
    }

}
