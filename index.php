<?php
require_once 'inc/dados.php';
$titulo = 'Início'; $pagina = 'index'; $js = 'home.js';
include 'inc/cabecalho.php';
?>
<main>
    <section class="texto-produtos">
        <h1>Fit Pulse: Premium Fitness Gear</h1>
        <p>Explore nossa linha de produtos esportivos, pensados para proporcionar conforto,
           resistência e alta performance. Escolha o equipamento ideal para elevar seu
           desempenho em qualquer atividade.</p>
        <a href="produtos.php" class="btn">Ver todos os produtos</a>
    </section>

    <section class="catalogo-home" aria-label="Catálogo de produtos">
        <h2 class="titulo-secao">Catálogo de produtos</h2>
        <div class="grade">
            <?php foreach ($produtos as $id => $p): ?>
                <article class="produto">
                    <a href="produto.php?id=<?= urlencode($id) ?>" class="produto-link">
                        <img src="img/produtos/<?= h($p['img']) ?>" alt="<?= h($p['nome']) ?>">
                        <h3><?= h($p['nome']) ?></h3>
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
        </div>
    </section>

    <h2 class="titulo-secao">Em destaque</h2>
    <section class="slider-carrosel" aria-label="Produtos em destaque">
        <button class="button-carrosel" id="button-voltar" aria-label="Anterior">&lt;</button>
        <div class="slider-images">
            <?php foreach ($produtos as $id => $p): ?>
                <div class="card-images">
                    <a href="produto.php?id=<?= urlencode($id) ?>" class="produto-link">
                        <img src="img/produtos/<?= h($p['img']) ?>" alt="<?= h($p['nome']) ?>">
                        <h3><?= h($p['nome']) ?></h3>
                    </a>
                    <p class="preco-falso"><?= real($p['antigo']) ?></p>
                    <p class="preco-real"><?= real($p['preco']) ?></p>
                    <button class="btn" data-add="<?= h($id) ?>">Comprar</button>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="button-carrosel" id="button-avancar" aria-label="Próximo">&gt;</button>
    </section>

    <section class="banners" aria-label="Fit Pulse em ação">
        <img src="img/banners/demonstracao1.png" alt="Treino com kettlebell Fit Pulse" id="banner-1">
        <img src="img/banners/demonstracao2.png" alt="Corrida com equipamentos Fit Pulse" id="banner-2">
    </section>
</main>
<?php include 'inc/rodape.php'; ?>
