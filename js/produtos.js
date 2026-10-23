// busca e filtro por categoria
const busca = document.getElementById('busca');
const chips = document.querySelectorAll('.chip');
const produtos = document.querySelectorAll('.produto');
const semResultado = document.getElementById('sem-resultado');
let categoria = 'Todos';

// tira acento e maiúscula pra comparar
const limpa = (t) => t.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');

function filtrar() {
    const termo = limpa(busca.value.trim());
    let achou = 0;
    produtos.forEach((p) => {
        const ok = limpa(p.dataset.nome).includes(termo) &&
                   (categoria === 'Todos' || p.dataset.cat === categoria);
        p.hidden = !ok;
        if (ok) achou++;
    });
    semResultado.hidden = achou > 0;
}

busca.addEventListener('input', filtrar);
chips.forEach((chip) => chip.addEventListener('click', () => {
    chips.forEach((c) => c.classList.remove('ativo'));
    chip.classList.add('ativo');
    categoria = chip.dataset.cat;
    filtrar();
}));
