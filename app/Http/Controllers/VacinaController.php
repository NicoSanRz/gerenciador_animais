<?php

namespace App\Http\Controllers;

use App\Models\VacinaModel;
use App\Models\AnimaisModel;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function index($id)
    {
        $animal = AnimaisModel::findOrFail($id);
        $vacinas = VacinaModel::where('id_animal', $id)->get();
        return view('vacinas.vacinas_list', compact('animal', 'vacinas'));
    }

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

        return redirect()->route('animais.vacinas', $request->input('id_animal'))->with('success', 'Vacina cadastrada com sucesso.');
    }

    public function edit($animal_id, $vacina_id)
    {
        $vacinas = VacinaModel::findOrFail($vacina_id);
        return view('vacinas.vacinas_edit', compact('vacinas', 'animal_id'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'descricao' => 'required|string|max:255',
            'vencimento' => 'required|date',
        ]);

        $vacinas = VacinaModel::findOrFail($id);
        $vacinas->update([
            'descricao' => $request->input('descricao'),
            'vencimento' => $request->input('vencimento'),
        ]);

        return redirect()->route('animais.vacinas', $vacinas->id_animal)->with('success', 'Vacina atualizada com sucesso.');
    }

    public function confirmDelete($id)
    {
        $vacinas = VacinaModel::findOrFail($id);
        return view('vacinas.vacinas_delete', compact('vacinas'));
    }

    public function destroy($id)
    {
        $vacinas = VacinaModel::findOrFail($id);
        $animal_id = $vacinas->id_animal;
        $vacinas->delete();

        return redirect()->route('animais.vacinas', $animal_id)->with('success', 'Vacina excluída com sucesso.');
    }
}
