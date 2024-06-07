<h1>Lista de Animais</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animais as $animal)
            <tr>
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->nome }}</td>
                <td>{{ $animal->especie }}</td>
                <td>{{ $animal->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>