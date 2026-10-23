const listaCarrinho = document.getElementById('itens-carrinho');
const totalCarrinho = document.getElementById('total-carrinho');
const finalizarPedido = document.getElementById('finalizar-pedido');
const moedaCarrinho = (valor) => valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

function renderizarCarrinho() {
    const carrinho = Carrinho.ler();
    const ids = Object.keys(carrinho).filter((id) => CATALOGO_CARRINHO[id] && Number(carrinho[id]) > 0);

    if (!ids.length) {
        listaCarrinho.innerHTML = '<p>Seu carrinho está vazio. <a href="produtos.php">Ver produtos</a></p>';
        totalCarrinho.textContent = '';
        finalizarPedido.setAttribute('aria-disabled', 'true');
        finalizarPedido.classList.add('desabilitado');
        return;
    }

    finalizarPedido.removeAttribute('aria-disabled');
    finalizarPedido.classList.remove('desabilitado');
    let total = 0;
    listaCarrinho.innerHTML = ids.map((id) => {
        const produto = CATALOGO_CARRINHO[id];
        const quantidade = Math.min(99, Math.max(1, parseInt(carrinho[id], 10) || 1));
        const subtotal = produto.preco * quantidade;
        total += subtotal;
        return `<article class="item-carrinho">
            <img src="img/produtos/${encodeURIComponent(produto.img)}" alt="">
            <div class="item-carrinho-info"><h2>${produto.nome}</h2><p>${moedaCarrinho(produto.preco)} cada</p></div>
            <label class="quantidade-carrinho">Quantidade
                <input type="number" min="1" max="99" value="${quantidade}" data-quantidade="${id}" aria-label="Quantidade de ${produto.nome}">
            </label>
            <p class="subtotal-carrinho"><span>Subtotal</span><strong>${moedaCarrinho(subtotal)}</strong></p>
        </article>`;
    }).join('');
    totalCarrinho.textContent = 'Total: ' + moedaCarrinho(total);
}

listaCarrinho.addEventListener('change', (evento) => {
    const campo = evento.target.closest('[data-quantidade]');
    if (!campo) return;
    const quantidade = Math.min(99, Math.max(1, parseInt(campo.value, 10) || 1));
    Carrinho.alterar(campo.dataset.quantidade, quantidade);
    renderizarCarrinho();
});

document.getElementById('limpar-carrinho').addEventListener('click', () => {
    Carrinho.limpar();
    renderizarCarrinho();
});

finalizarPedido.addEventListener('click', (evento) => {
    if (finalizarPedido.getAttribute('aria-disabled') === 'true') evento.preventDefault();
});

renderizarCarrinho();
