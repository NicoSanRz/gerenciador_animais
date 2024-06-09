<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .welcome-buttons {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Bem-vindo à Aplicação!</h1>
        <div class="welcome-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mr-2">Entrar</a>
            <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-lg">Cadastrar-se</a>
        </div>
    </div>
</body>
</html>
