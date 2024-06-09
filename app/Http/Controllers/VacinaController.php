<?php

namespace App\Http\Controllers;

use App\Models\VacinaModel;
use App\Models\AnimaisModel;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    /*public function index()
    {
        $vacinas = VacinaModel::all();
        return view('vacinas/vacinas_index', compact('vacinas'));
    }*/

    public function index($id)
    {
        $animal = AnimaisModel::findOrFail($id);
        $vacinas = VacinaModel::where('id_animal', $id)->get();
        return view('vacinas.vacinas_list', compact('animal','vacinas'));
    }
    
    public function list()
    {
        $vacinas = VacinaModel::all();
        return view('vacinas/vacinas_list', compact('vacinas'));
    }

    // CREATE
    public function create($id)
    {
        return view('vacinas.vacinas_create', compact('id'));
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'descricao' => 'required|string|max:255',
            'vencimento' => 'required|date',
            'id_animal' => 'required|integer|exists:animais,id',
        ]);

        // Criação da vacina
        VacinaModel::create([
            'descricao' => $request->input('descricao'),
            'vencimento' => $request->input('vencimento'),
            'id_animal' => $request->input('id_animal'),
        ]);

        return redirect()->route('dashboard', $request->input('id_animal'))->with('success', 'Vacina cadastrada com sucesso.');
    }

    // UPDATE
    public function edit($id)
    {
        $vacinas = VacinaModel::findOrFail($id);
        return view('vacinas/vacinas_edit', compact('vacinas'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário

        $vacinas = VacinaModel::findOrFail($id);
        $vacinas->update([
            'descricao'   => $request->input('descricao'),
            'vencimento'  => $request->input('vencimento'),
            'id_animal'   => $request->input('id_animal'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Vacina atualizada com sucesso.');
    }

    // DELETE
    public function confirmDelete($id)
    {
        $vacinas = VacinaModel::findOrFail($id);
        return view('vacinas/vacinas_delete', compact('vacinas'));
    }

     public function destroy($id)
    {
        $vacinas = VacinaModel::findOrFail($id);
        $animal = VacinaModel::where('id_animal', $id)->get();
        $vacinas->delete();

        return redirect()->route('dashboard')->with('success', 'Vacina Excluída com Sucesso!');
    }
}
