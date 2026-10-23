// lista o carrinho no formulário e recalcula o total
const lista = document.getElementById('lista-itens');
const totalEl = document.getElementById('total');
const moeda = (v) => v.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

function calcular() {
    let total = 0;
    lista.querySelectorAll('input[data-id]').forEach((inp) => {
        total += CATALOGO[inp.dataset.id].preco * (parseInt(inp.value) || 0);
    });
    totalEl.textContent = 'Total: ' + moeda(total);
}

function desenhar() {
    const carrinho = Carrinho.ler();
    const ids = Object.keys(carrinho).filter((id) => CATALOGO[id]);
    if (ids.length === 0) {
        lista.innerHTML = '<p>Nenhum produto escolhido. <a href="produtos.php">Ver produtos</a></p>';
        totalEl.textContent = '';
        return;
    }
    // vai pro PHP como itens[id] = quantidade
    lista.innerHTML = ids.map((id) =>
        `<div class="linha"><span>${CATALOGO[id].nome}</span>
         <input type="number" min="0" max="99" name="itens[${id}]" data-id="${id}" value="${carrinho[id]}" aria-label="Quantidade de ${CATALOGO[id].nome}"></div>`
    ).join('');
    calcular();
}

lista.addEventListener('input', (e) => {
    if (!e.target.dataset.id) return;
    Carrinho.alterar(e.target.dataset.id, parseInt(e.target.value) || 0);
    calcular();
});

desenhar();
