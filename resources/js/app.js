import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Elementos do DOM
const btnStart = document.getElementById('btn-start');
const btnGameOver = document.getElementById('btn-game-over');
const modal = document.getElementById('modal-start');
const modalGameOver = document.getElementById('modal-game-over');
const cenario = document.getElementById('cenario');
const acertosElement = document.getElementById('acertos');
const pilhas = document.querySelectorAll('.pilhas');
const minutosElement = document.querySelector(".minutos");
const segundosElement = document.querySelector(".segundos");

// Configurações do jogo
let larguraCenario = window.innerWidth * 0.6;
let alturaCenario = window.innerHeight * 0.6;
const ctx = cenario.getContext('2d');
let positionXAlvo;
let positionYAlvo;
let tamanhoAlvo = larguraCenario * 0.1;
let isJogando = false;

// Variáveis do jogo
let acertos = 0;

let erros = 0;
let jaAcertou = false;
let timer;
let segundosCont = 60;
let minutosCont = 1;

// Funções
function redimensionarTela() {
	const tamanhoTelaTablet = 768;
	const tamanhoTelaCelular = 600;

	if (window.innerWidth >= tamanhoTelaTablet) { //se a tela for do tamanho de um computador ele pega 60% da tela
		larguraCenario = window.innerWidth * 0.6;
	}
	else if (window.innerWidth <= tamanhoTelaTablet && window.innerWidth > tamanhoTelaCelular) { //se for tablet pega 80%
		larguraCenario = window.innerWidth * 0.8;
	}
	else { //se for do tamanho do celular ele pega 100%
		larguraCenario = window.innerWidth * 1;
	}

	alturaCenario = larguraCenario / 2;

	cenario.width = larguraCenario;
	cenario.height = alturaCenario;

	tamanhoAlvo = larguraCenario * 0.1; //tamanho do alvo vai ser 8% da tela
}

function desenhar(positionXAlvo, positionYAlvo) {
	const img = new Image();
	img.src = './images/caruso.png';

	img.addEventListener('load', function () {
		ctx.drawImage(this, positionXAlvo, positionYAlvo, tamanhoAlvo, tamanhoAlvo);
	});
}

function apagaAlvo() {
	ctx.clearRect(0, 0, larguraCenario, alturaCenario);
}

function iniciarTimer() {
	clearInterval(timer);
	timer = setInterval(() => {
		jaAcertou = false;
		apagaAlvo();
		positionXAlvo = Math.floor(Math.random() * (larguraCenario - 10));
		positionYAlvo = Math.floor(Math.random() * (alturaCenario - 10));
		desenhar(positionXAlvo, positionYAlvo);

		segundosCont--;
		segundosElement.innerText = segundosCont;
		if (segundosCont === 59) {
			minutosCont--;
			if (minutosCont < 10) {
				minutosElement.innerText = "0" + minutosCont;
			}
			else {
				minutosElement.innerText = minutosCont;
			}

		}

		if (segundosCont === 0) {
			segundosCont = 60;
			segundosElement.innerText = "00";
			finalizarJogo();
		}
		else {
			if (segundosCont < 10) {
				segundosElement.innerText = "0" + segundosCont;
			}
			else {
				segundosElement.innerText = segundosCont;
			}

		}

	}, 1000);
}

function contarAcertoOuErro(positionClickX, positionClickY) {
	//   tamanhoAlvo = larguraCenario * porcentagem;
	tamanhoAlvo = larguraCenario * 0.1;
	if (
		positionClickX >= positionXAlvo &&
		positionClickX < positionXAlvo + tamanhoAlvo &&
		positionClickY >= positionYAlvo &&
		positionClickY < positionYAlvo + tamanhoAlvo
	) {
		if (!jaAcertou) {
			acertos++;
			acertosElement.innerText = acertos;
			ctx.clearRect(0, 0, larguraCenario, alturaCenario);
		}
		jaAcertou = true;
	} else {
		pilhas[erros].style.display = 'none';
		erros++;
	}
}

function verSeJaPerdeu() {
	if (erros === 3) {
		finalizarJogo();
	}
}

function finalizarJogo() {
	modalGameOver.style.display = 'flex';
	modalGameOver.style.visibility = 'visible';
	const spanPontuacao = document.getElementById('span-pontuacao');
	spanPontuacao.innerText = acertos;
	const spanTentativas = document.getElementById('span-tentativas');
	spanTentativas.innerText = acertos + erros;
	const inputAcertos = document.getElementById("numberAcertos");
	const inputErros = document.getElementById("numberErros");
	inputAcertos.value = acertos;
	inputErros.value = erros;
	acertos = 0;
	erros = 0;
	acertosElement.innerText = acertos;



	minutosCont = 1;
	minutosElement.innerText = "01";
	segundosCont = 60;
	segundosElement.innerText = "00";

	pilhas.forEach(pilha => {
		pilha.style.display = 'flex';
	});

	const audio = new Audio('audios/everbody-hates-chris.mp3');
	audio.play();

	positionXAlvo = null;
	positionYAlvo = null;
	clearInterval(timer);
	apagaAlvo();
	cenario.classList.remove('tela-clicavel');
}

// Eventos
window.addEventListener('resize', () => {
	redimensionarTela();
	//   desenhar(positionXAlvo, positionYAlvo);
});
window.addEventListener('load', () => {
	redimensionarTela();
	desenhar(positionXAlvo, positionYAlvo);
});

cenario.addEventListener('click', (e) => {
	if (jaAcertou) {
		return;
	}
	if (!cenario.classList.contains('tela-clicavel')) {
		return;
	}
	// if ( modalGameOver.style.visibility == 'hidden') {
	// 	return;
	// }
	const rect = cenario.getBoundingClientRect();
	const positionClickX = e.clientX - rect.left;
	const positionClickY = e.clientY - rect.top;

	contarAcertoOuErro(positionClickX, positionClickY);
	verSeJaPerdeu();
});

btnStart.addEventListener('click', () => {
	console.log("opa");
	iniciarTimer();
	modal.style.display = 'none';
	cenario.classList.add('tela-clicavel');
});

btnGameOver.addEventListener('click', () => {
	console.log("opa");
	iniciarTimer();
	modalGameOver.style.display = 'none';
	cenario.classList.add('tela-clicavel');
});

// Redimensionar a tela no início
redimensionarTela();
// desenhar(positionXAlvo, positionYAlvo);