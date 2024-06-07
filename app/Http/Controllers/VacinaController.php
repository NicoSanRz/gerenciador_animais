<?php

namespace App\Http\Controllers;

use App\Models\VacinaModel;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function index()
    {
        $vacinas = VacinaModel::all();
        return view('vacinas/vacinas_index', compact('vacinas'));
    }
    
    public function list()
    {
        $vacinas = VacinaModel::all();
        return view('vacinas/vacinas_list', compact('vacinas'));
    }

    // CREATE
    public function create()
    {
        return view('vacinas/vacinas_create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário

        VacinaModel::create([
            'descricao'   => $request->input('descricao'),
            'vencimento'  => $request->input('vencimento'),
            'id_animal'   => $request->input('id_animal'),
        ]);

        return redirect()->route('vacinas.list')->with('success', 'Vacina Cadastrado com Sucesso!');
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

        return redirect()->route('vacinas.index')->with('success', 'Usuário atualizado com sucesso.');
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
        $vacinas->delete();

        return redirect()->route('vacinas.index')->with('success', 'Vacina Excluído com Sucesso!');
    }
}
