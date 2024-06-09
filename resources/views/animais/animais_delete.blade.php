<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Exclusão</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Confirmação de Exclusão</h2>

        <p>Você tem certeza de que deseja excluir o(a) "{{ $animais->nome }}"?</p>

        <form action="{{ route('animais.destroy', $animais->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
