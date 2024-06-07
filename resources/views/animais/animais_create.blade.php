<form action="{{ route('animais.store') }}" method="POST">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="especie">Espécie:</label>
    <input type="text" id="especie" name="especie" required>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required>

    <button type="submit">Cadastrar</button>
</form>