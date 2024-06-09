<!DOCTYPE html>
<html>
<head>
    <title>Edição de Animais</title>
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
        select {
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
        button[type="submit"] {
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: all .15s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Edição de Animal</h2>
        <form action="{{ route('animais.update', $animais->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ $animais->nome }}" required>
            </div>

            <div class="form-group">
                <label for="especie">Espécie:</label>
                <select id="especie" name="especie" class="form-control" required>
                    <option value="">Selecione uma Opção</option>
                    <option value="Gato" {{ $animais->especie == 'Gato' ? 'selected' : '' }}>Gato</option>
                    <option value="Cachorro" {{ $animais->especie == 'Cachorro' ? 'selected' : '' }}>Cachorro</option>
                    <option value="Cavalo" {{ $animais->especie == 'Cavalo' ? 'selected' : '' }}>Cavalo</option>
                    <option value="Ovelha" {{ $animais->especie == 'Ovelha' ? 'selected' : '' }}>Ovelha</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="">Selecione uma Opção</option>
                    <option value="Saudável" {{ $animais->status == 'Saudável' ? 'selected' : '' }}>Saudável</option>
                    <option value="Doente" {{ $animais->status == 'Doente' ? 'selected' : '' }}>Doente</option>
                    <option value="Recuperação" {{ $animais->status == 'Recuperação' ? 'selected' : '' }}>Recuperação</option>
                    @if($animais->especie == 'Ovelha')
                        <option value="Pronto(a) para abate" {{ $animais->status == 'Pronto(a) para abate' ? 'selected' : '' }}>Pronto(a) para abate</option>
                    @endif
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
</html>
