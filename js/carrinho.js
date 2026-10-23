// carrinho salvo no localStorage: { id: quantidade }
const Carrinho = {
    ler() {
        try { return JSON.parse(localStorage.getItem('fp_carrinho')) || {}; }
        catch (e) { return {}; }
    },
    salvar(c) {
        localStorage.setItem('fp_carrinho', JSON.stringify(c));
        this.atualizarContador();
    },
    adicionar(id) {
        const c = this.ler();
        c[id] = Math.min((c[id] || 0) + 1, 99);
        this.salvar(c);
    },
    alterar(id, qtd) {
        const c = this.ler();
        if (qtd <= 0) delete c[id]; else c[id] = Math.min(qtd, 99);
        this.salvar(c);
    },
    limpar() { localStorage.removeItem('fp_carrinho'); this.atualizarContador(); },
    total() { return Object.values(this.ler()).reduce((soma, q) => soma + q, 0); },
    atualizarContador() {
        const el = document.getElementById('cart-count');
        if (el) el.textContent = this.total();
    }
};
Carrinho.atualizarContador();

// botão com data-add adiciona o produto
document.addEventListener('click', (e) => {
    const botao = e.target.closest('[data-add]');
    if (!botao) return;
    Carrinho.adicionar(botao.dataset.add);
    botao.textContent = 'Adicionado';
    setTimeout(() => { botao.textContent = 'Comprar'; }, 1200);
});
