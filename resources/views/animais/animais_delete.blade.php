<h2>Confirmação de Exclusão</h2>

<p>Você tem certeza de que deseja excluir o(a)"{{ $animal->nome }}"?</p>

<form action="{{ route('animal.destroy', $animal->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>
