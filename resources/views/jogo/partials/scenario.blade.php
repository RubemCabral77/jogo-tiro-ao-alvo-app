<div id="div-cenario">
    <div class="modal" id="modal-start">
        <div class="div-conteudo-modal">
            <h2 class="texto-modal">Detone o Caruso!</h2>
            <div class="div-btn-start">
                <button class="btn-jogo" id="btn-start">JOGAR</button>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-game-over">
        <div class="div-conteudo-modal">
            <h2 class="texto-modal">Game Over</h2>
            <form class="form p-3 container" action="ws/salvar.php" method="get">
                <h3>cadastrar partida:</h3>
                <div class="form-group">
                    <input class="col-sm-10" type="text" name="nome" id="txtNome" class="form-control"
                        placeholder="Nome Jogador">
                </div>

                <input class="col-sm-10" type="number" name="acertos" id="numberAcertos" class="form-control"
                    readonly style="display:none">

                <input class="col-sm-10" type="number" name="erros" id="numberErros" class="form-control" readonly
                    style="display:none">

                <input class="col-sm-10" type="datetime" name="datap" id="txtData" class="form-control"
                    value="<?= date('Y-m-d'); ?>" readonly style="display:none">

                <input class="col-sm-10" type="time" name="horap" id="txtHora" class="form-control"
                    value="<?= date('H:i:s') ?>" readonly style="display:none">

                <input type="submit" value="Salvar" class="btn-salvar" id="btn-game-over">
            </form>

            <h3>pontuação: <span id="span-pontuacao"></span></h3>
            <h3>tentativas: <span id="span-tentativas"></span></h3>
        </div>
    </div>

    <canvas id="cenario"></canvas>
</div>