<?php
require_once 'inc/dados.php';
$titulo = 'Produtos'; $pagina = 'produtos'; $js = 'produtos.js';
$categorias = array_unique(array_column($produtos, 'cat'));
include 'inc/cabecalho.php';
?>
<main>
    <section class="texto-produtos">
        <h1>Conheça nossos produtos</h1>
        <p>Busque pelo nome ou filtre por categoria. Adicione ao pedido e finalize em Pedido.</p>
    </section>

    <div class="filtros">
        <input type="search" id="busca" placeholder="Buscar produto..." aria-label="Buscar produto">
        <button class="chip ativo" data-cat="Todos">Todos</button>
        <?php foreach ($categorias as $c): ?>
            <button class="chip" data-cat="<?= h($c) ?>"><?= h($c) ?></button>
        <?php endforeach; ?>
    </div>

    <section class="grade">
        <?php foreach ($produtos as $id => $p): ?>
            <article class="produto" data-nome="<?= h($p['nome'] . ' ' . $p['desc']) ?>" data-cat="<?= h($p['cat']) ?>">
                <a href="produto.php?id=<?= urlencode($id) ?>" class="produto-link">
                    <img src="img/produtos/<?= h($p['img']) ?>" alt="<?= h($p['nome']) ?>">
                    <h2><?= h($p['nome']) ?></h2>
                </a>
                <p class="desc"><?= h($p['desc']) ?></p>
                <p class="preco-falso"><?= real($p['antigo']) ?></p>
                <p class="preco-real"><?= real($p['preco']) ?></p>
                <div class="acoes">
                    <a href="produto.php?id=<?= urlencode($id) ?>" class="btn btn-claro">Ver detalhes</a>
                    <button class="btn" data-add="<?= h($id) ?>">Comprar</button>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
    <p id="sem-resultado" class="texto-produtos" hidden>Nenhum produto encontrado.</p>
</main>
<?php include 'inc/rodape.php'; ?>
