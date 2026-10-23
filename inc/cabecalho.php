<?php

require_once __DIR__ . '/dados.php';
$links = ['index' => 'Início', 'produtos' => 'Produtos'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($titulo) ?> - Fit Pulse</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="menu">
        <a href="index.php"><img src="img/logo.png" alt="Fit Pulse" id="logo"></a>
        <nav id="menu-nav">
            <?php foreach ($links as $arq => $rotulo): ?>
                <a href="<?= $arq ?>.php"<?= $arq === $pagina ? ' class="ativo"' : '' ?>><?= $rotulo ?></a>
            <?php endforeach; ?>
            <a href="contato.php" class="carrinho" title="Itens no pedido">Pedido <span id="cart-count">0</span></a>
        </nav>
    </div>
</header>
