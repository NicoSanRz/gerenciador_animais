@extends('layouts.layout')

@section('title', 'Lista de Vacinas')

@section('content')
<div class="container mt-5">
    <h1>Lista de Vacinas de {{$animal->nome}}</h1>
    <a href="{{ route('vacinas.create', ['id' => $animal->id])}}" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Cadastrar Nova Vacina</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Vencimento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vacinas as $vacina)
                <tr>
                    <td>{{ $vacina->id }}</td>
                    <td>{{ $vacina->descricao }}</td>
                    <td>{{ $vacina->vencimento }}</td>
                    <td>
                        <a href="{{ route('vacinas.edit', ['animal_id' => $animal->id, 'vacina_id' => $vacina->id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                        <form action="{{ route('vacinas.confirm-delete', $vacina->id) }}" method="GET" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection