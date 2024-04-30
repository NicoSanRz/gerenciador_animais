<!-- resources/views/usuarios/confirm-delete.blade.php -->

<h2>Confirmação de Exclusão</h2>

<p>Você tem certeza de que deseja excluir o usuário "{{ $usuario->nome }}"?</p>

<form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>