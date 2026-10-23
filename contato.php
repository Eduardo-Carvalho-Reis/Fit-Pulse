<?php
require_once 'inc/dados.php';
$titulo = 'Contato e Pedidos'; $pagina = 'contato'; $js = 'contato.js';
$catalogo = [];
foreach ($produtos as $id => $p) { $catalogo[$id] = ['nome' => $p['nome'], 'preco' => $p['preco']]; }
include 'inc/cabecalho.php';
?>
<main>
    <section class="texto-produtos">
        <h1>Faça seu pedido ou peça um orçamento</h1>
        <p>Os produtos adicionados na loja aparecem abaixo.</p>
    </section>

    <form class="form" action="processa.php" method="post">
        <fieldset>
            <legend>Sua solicitação</legend>
            <label class="inline"><input type="radio" name="tipo" value="Pedido" checked> Pedido</label>
            <label class="inline"><input type="radio" name="tipo" value="Orçamento"> Orçamento</label>
            <div id="lista-itens"></div>
            <p id="total" class="total"></p>
        </fieldset>

        <fieldset>
            <legend>Seus dados</legend>
            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" required>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000">
            <label for="cidade">Cidade</label>
            <input type="text" id="cidade" name="cidade">
        </fieldset>

        <fieldset>
            <legend>Forma de pagamento</legend>
            <label class="inline"><input type="radio" name="pagamento" value="Pix" checked> Pix</label>
            <label class="inline"><input type="radio" name="pagamento" value="Cartão"> Cartão</label>
            <label class="inline"><input type="radio" name="pagamento" value="Boleto"> Boleto</label>
        </fieldset>

        <fieldset>
            <legend>Mensagem</legend>
            <label for="mensagem">Observações ou detalhes do orçamento</label>
            <textarea id="mensagem" name="mensagem" rows="4"></textarea>
        </fieldset>

        <button type="submit" class="btn">Enviar solicitação</button>
    </form>
</main>
<script>const CATALOGO = <?= json_encode($catalogo, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?>;</script>
<?php include 'inc/rodape.php'; ?>
