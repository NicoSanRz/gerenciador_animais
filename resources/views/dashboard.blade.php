@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h1>Bem-vindo, {{ Auth::user()->nome }}!</h1>
    <div class="mt-3">
        <h2>Lista de Animais Cadastrados</h2>
        <a href="{{ route('animais.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Adicionar Novo Registro</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animais as $animal)
                    <tr>
                        <td>{{ $animal->id }}</td>
                        <td>{{ $animal->nome }}</td>
                        <td>{{ $animal->especie }}</td>
                        <td>{{ $animal->status }}</td>
                        <td>
                            <a href="{{ route('animais.edit', $animal->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                            <form action="{{ route('animais.confirm-delete', $animal->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Excluir</button>
                            </form>
                            <a href="{{ route('animais.vacinas', $animal->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver Vacinas</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

