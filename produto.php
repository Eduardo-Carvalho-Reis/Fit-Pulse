<?php
require_once 'inc/dados.php';

// página de um produto: produto.php?id=kettlebell
$id = $_GET['id'] ?? '';
if (!is_string($id) || !isset($produtos[$id])) {
    http_response_code(404);
    $titulo = 'Produto não encontrado'; $pagina = 'produtos'; $js = '';
    include 'inc/cabecalho.php';
    ?>
    <main>
        <section class="texto-produtos">
            <h1>Produto não encontrado</h1>
            <p>O produto que você procura não existe ou foi removido.</p>
            <a href="produtos.php" class="btn">Ver todos os produtos</a>
        </section>
    </main>
    <?php
    include 'inc/rodape.php';
    exit;
}

$p = $produtos[$id];
$desconto = round((1 - $p['preco'] / $p['antigo']) * 100);

// até 3 produtos da mesma categoria
$relacionados = array_filter($produtos, fn($r, $rid) => $rid !== $id && $r['cat'] === $p['cat'], ARRAY_FILTER_USE_BOTH);
$relacionados = array_slice($relacionados, 0, 3, true);

$titulo = $p['nome']; $pagina = 'produtos'; $js = '';
include 'inc/cabecalho.php';
?>
<main>
   
    <section class="detalhe">
        <div class="detalhe-img">
            <img src="img/produtos/<?= h($p['img']) ?>" alt="<?= h($p['nome']) ?>">
        </div>
        <div class="detalhe-info">
            <p class="categoria"><?= h($p['cat']) ?></p>
            <h1><?= h($p['nome']) ?></h1>
            <p><?= h($p['desc']) ?></p>

            <p class="preco-falso"><?= real($p['antigo']) ?></p>
            <p class="preco-real"><?= real($p['preco']) ?></p>
            <p class="desconto"><?= $desconto ?>% de desconto</p>

            <div class="acoes">
                <button class="btn" data-add="<?= h($id) ?>">Adicionar ao carrinho </button>
                
            </div>
            <p><a href="produtos.php" class="btn btn-claro">Voltar aos produtos</a></p>
        </div>
    </section>

    <?php if ($relacionados): ?>
    <section class="catalogo-home" aria-label="Produtos relacionados">
        <h2 class="titulo-secao">Veja também</h2>
        <div class="grade">
            <?php foreach ($relacionados as $rid => $r): ?>
                <article class="produto">
                    <a href="produto.php?id=<?= urlencode($rid) ?>" class="produto-link">
                        <img src="img/produtos/<?= h($r['img']) ?>" alt="<?= h($r['nome']) ?>">
                        <h3><?= h($r['nome']) ?></h3>
                    </a>
                    <p class="preco-real"><?= real($r['preco']) ?></p>
                    <a href="produto.php?id=<?= urlencode($rid) ?>" class="btn btn-claro">Ver detalhes</a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>
</main>
<?php include 'inc/rodape.php'; ?>
