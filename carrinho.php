<?php
require_once 'inc/dados.php';
$titulo = 'Carrinho'; $pagina = ''; $js = 'pagina-carrinho.js';
$catalogo = [];
foreach ($produtos as $id => $p) {
    $catalogo[$id] = ['nome' => $p['nome'], 'preco' => $p['preco'], 'img' => $p['img']];
}
include 'inc/cabecalho.php';
?>
<main>
    <section class="texto-produtos">
        <h1>Meu carrinho</h1>
    </section>

    <section class="carrinho-painel" aria-label="Itens do carrinho">
        <div id="itens-carrinho" aria-live="polite"></div>
        <p id="total-carrinho" class="total"></p>
        <div class="acoes-carrinho">
            <a href="produtos.php" class="btn btn-claro">Continuar comprando</a>
            <button type="button" id="limpar-carrinho" class="btn btn-claro">Limpar carrinho</button>
            <a href="contato.php" id="finalizar-pedido" class="btn">Finalizar pedido</a>
        </div>
    </section>
</main>
<script>const CATALOGO_CARRINHO = <?= json_encode($catalogo, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;</script>
<?php include 'inc/rodape.php'; ?>
