<!-- resources/views/usuarios/index.blade.php -->

<h1>Lista de Vacinas</h1>

<table>
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
            </tr>
        @endforeach
    </tbody>
</table>
