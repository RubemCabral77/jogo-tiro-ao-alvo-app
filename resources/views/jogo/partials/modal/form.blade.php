<form class="form p-3 container" action="{{ route('partida.create') }}" method="post">
    @csrf

    <h3 class="">Cadastrar partida</h3>

    <input class="" type="number" name="acertos" id="numberAcertos" class="form-control" readonly
        style="display:none" hidden>

    <input class="" type="number" name="erros" id="numberErros" class="form-control" readonly
        style="display:none">

    <input type="submit" value="Salvar" class="btn-salvar" id="btn-game-over">
</form>
