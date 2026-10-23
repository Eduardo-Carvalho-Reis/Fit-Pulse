<?php
require_once 'inc/dados.php';

// só aceita POST do formulário
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contato.php');
    exit;
}
date_default_timezone_set('America/Sao_Paulo');

function campo($nome) {
    $v = $_POST[$nome] ?? '';
    return is_string($v) ? trim($v) : '';
}

$nome      = campo('nome');
$email     = campo('email');
$telefone  = campo('telefone');
$cidade    = campo('cidade');
$mensagem  = campo('mensagem');
$tipo      = campo('tipo') === 'Orçamento' ? 'Orçamento' : 'Pedido';
$pagamento = in_array(campo('pagamento'), ['Pix', 'Cartão', 'Boleto']) ? campo('pagamento') : 'Pix';

// confere o id e recalcula o preço aqui, sem confiar no navegador
$itens = [];
$total = 0;
$brutos = $_POST['itens'] ?? [];
if (!is_array($brutos)) { $brutos = []; }
foreach ($brutos as $id => $qtd) {
    $qtd = min((int)$qtd, 99);
    if (isset($produtos[$id]) && $qtd > 0) {
        $sub = $produtos[$id]['preco'] * $qtd;
        $itens[] = ['nome' => $produtos[$id]['nome'], 'qtd' => $qtd, 'preco' => $produtos[$id]['preco'], 'sub' => $sub];
        $total += $sub;
    }
}

// validação
$erros = [];
if ($nome === '') { $erros[] = 'Informe seu nome.'; }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $erros[] = 'Informe um e-mail válido.'; }
if ($tipo === 'Pedido' && !$itens) { $erros[] = 'Adicione ao menos um produto ao pedido.'; }
if ($tipo === 'Orçamento' && !$itens && $mensagem === '') { $erros[] = 'Escolha produtos ou descreva o que precisa na mensagem.'; }

$sucesso   = !$erros;
$protocolo = 'FP-' . date('ymd') . '-' . random_int(1000, 9999);
$jsInline  = $sucesso ? 'Carrinho.limpar();' : ''; // limpa o carrinho

$titulo = 'Confirmação'; $pagina = 'contato';
include 'inc/cabecalho.php';
?>
<main>
    <div class="comprovante">
    <?php if (!$sucesso): ?>

        <h1>Não foi possível enviar</h1>
        <div class="erro">
            <?php foreach ($erros as $e): ?><p><?= h($e) ?></p><?php endforeach; ?>
        </div>
        <button type="button" class="btn" onclick="history.back()">Voltar e corrigir</button>

    <?php else: ?>

        <h1><?= $tipo === 'Pedido' ? 'Pedido recebido!' : 'Orçamento solicitado!' ?></h1>
        <p>Obrigado, <strong><?= h($nome) ?></strong>! Enviaremos a confirmação para <strong><?= h($email) ?></strong>.</p>
        <p><strong>Protocolo:</strong> <?= $protocolo ?><br>
           <strong>Recebido em:</strong> <?= date('d/m/Y \à\s H:i') ?><br>
           <?php if ($telefone !== ''): ?><strong>Telefone:</strong> <?= h($telefone) ?><br><?php endif; ?>
           <?php if ($cidade !== ''): ?><strong>Cidade:</strong> <?= h($cidade) ?><br><?php endif; ?>
           <strong>Pagamento:</strong> <?= h($pagamento) ?></p>

        <?php if ($itens): ?>
            <table>
                <tr><th>Produto</th><th>Qtd</th><th class="valor">Unitário</th><th class="valor">Subtotal</th></tr>
                <?php foreach ($itens as $i): ?>
                    <tr>
                        <td><?= h($i['nome']) ?></td>
                        <td><?= $i['qtd'] ?></td>
                        <td class="valor"><?= real($i['preco']) ?></td>
                        <td class="valor"><?= real($i['sub']) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr><th colspan="3">Total</th><th class="valor"><?= real($total) ?></th></tr>
            </table>
        <?php endif; ?>

        <?php if ($mensagem !== ''): ?>
            <p><strong>Mensagem:</strong><br><?= nl2br(h($mensagem)) ?></p>
        <?php endif; ?>

        <a href="index.php" class="btn">Voltar ao início</a>

    <?php endif; ?>
    </div>
</main>
<?php include 'inc/rodape.php'; ?>
