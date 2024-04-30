<!-- resources/views/usuarios/edit.blade.php -->

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ $usuario->nome }}" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $usuario->email }}" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="submit">Atualizar</button>
</form>
