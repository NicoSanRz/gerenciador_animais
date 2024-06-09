<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Animais</title>
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
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastrar Animal</h2>
        <form action="{{ route('animais.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>
        
            <div class="form-group">
                <label for="especie">Espécie:</label>
                <select id="especie" name="especie" class="form-control" required>
                    <option value="">Selecione uma Opção</option>
                    <option value="Gato">Gato</option>
                    <option value="Cachorro">Cachorro</option>
                    <option value="Cavalo">Cavalo</option>
                    <option value="Ovelha">Ovelha</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="">Selecione uma Opção</option>
                    <option value="Saudável">Saudável</option>
                    <option value="Doente">Doente</option>
                    <option value="Recuperação">Recuperação</option>
                    @if(old('especie') == 'Ovelha')
                        <option value="Pronto(a) para abate">Pronto(a) para abate</option>
                    @endif
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
