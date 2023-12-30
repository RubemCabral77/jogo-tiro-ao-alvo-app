<div class="classificacao flex flex-row flex-nowrap mt-4 mb-4 justify-around">
    <div class="p-4 rounded-md bg-principal">
        <h2 class="flex flex-col flex-nowrap text-center">Acertos: <span id="acertos" class="text-lg font-semibold">0</span></h2>
    </div>
    <div class="w-10 flex justify-center items-center cronometro">
        <span class="minutos text-lg font-semibold">01</span>:<span class="segundos text-lg font-semibold">00</span>
    </div>

    <div id="div-erros" class="p-4 rounded-md bg-principal w-10 flex justify-center items-center">
        <img class="pilhas w-30" id="pilha-1" src="{{ asset('images/bateria.png') }}" >
        <img class="pilhas w-30" id="pilha-2" src="{{ asset('images/bateria.png') }}">
        <img class="pilhas w-30" id="pilha-3" src="{{ asset('images/bateria.png') }}">
    </div>
</div>