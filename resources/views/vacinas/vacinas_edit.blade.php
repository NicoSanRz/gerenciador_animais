<!DOCTYPE html>
<html>
<head>
    <title>Editar Vacina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        button[type="submit"],
        .btn-secondary {
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: all .15s ease-in-out;
        }
        .btn-secondary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Vacina</h2>
        <form action="{{ route('vacinas.update', $vacinas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $vacinas->descricao }}" required>
            </div>
            <div class="form-group">
                <label for="vencimento">Vencimento:</label>
                <input type="date" class="form-control" id="vencimento" name="vencimento" value="{{ $vacinas->vencimento }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
