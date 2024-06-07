<form action="{{ route('vacinas.update', $vacinas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required>

    <label for="vencimento">Vencimento:</label>
    <input type="date" id="vencimento" name="vencimento" required>

    <label for="id_animal">ID do Animal:</label>
    <input type="text" id="id_animal" name="id_animal" required>

    <button type="submit">Atualizar</button>
</form>
