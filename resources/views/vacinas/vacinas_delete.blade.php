<h2>Confirmação de Exclusão</h2>

<p>Você tem certeza de que deseja excluir a vacina "{{ $vacina->descricao }}"?</p>

<form action="{{ route('vacinas.destroy', $vacinas->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>