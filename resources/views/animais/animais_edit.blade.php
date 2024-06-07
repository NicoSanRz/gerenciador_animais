<form action="{{ route('animais.update', $animais->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="especie">Espécie:</label>
    <input type="text" id="especie" name="especie" required>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required>
    
    <button type="submit">Atualizar</button>
</form>
