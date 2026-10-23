// carrossel: 4, 2 ou 1 cartão por vez, depende da largura
const cards = document.querySelectorAll('.card-images');
const btnAvancar = document.getElementById('button-avancar');
const btnVoltar = document.getElementById('button-voltar');
let inicio = 0;

function visiveis() {
    return window.innerWidth < 600 ? 1 : window.innerWidth < 900 ? 2 : 4;
}

function mostrar() {
    const n = visiveis();
    inicio = Math.max(0, Math.min(inicio, cards.length - n));
    cards.forEach((card, i) => card.classList.toggle('off', i < inicio || i >= inicio + n));
    btnVoltar.disabled = inicio === 0;
    btnAvancar.disabled = inicio >= cards.length - n;
}

btnAvancar.addEventListener('click', () => { inicio++; mostrar(); });
btnVoltar.addEventListener('click', () => { inicio--; mostrar(); });
window.addEventListener('resize', mostrar);
mostrar();

// banners trocam sozinhos a cada 3,5 s
const b1 = document.getElementById('banner-1');
const b2 = document.getElementById('banner-2');
const fotos = [1, 2, 3, 4, 5, 6].map(n => `img/banners/demonstracao${n}.png`);
let indice = 0;

setInterval(() => {
    indice = (indice + 1) % fotos.length;
    b1.src = fotos[indice];
    b2.src = fotos[(indice + 1) % fotos.length];
}, 3500);
