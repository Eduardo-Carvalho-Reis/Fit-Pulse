# Fit Pulse

Loja virtual demonstrativa de produtos fitness, desenvolvida como Trabalho de Conclusão do curso de Programação Web SENAI. O projeto usa PHP para montar as páginas e processar solicitações, HTML e CSS para a interface e JavaScript para interações no catálogo e no carrinho.

## Funcionalidades

- Página inicial com produtos em destaque.
- Catálogo com busca por nome e filtro por categoria.
- Página de detalhes para cada produto.
- Adição de produtos ao carrinho a partir do catálogo e das páginas de produto.
- Carrinho salvo no `localStorage` do navegador, com contador no menu.
- Resumo do carrinho com preço unitário, quantidade, subtotal por produto e total.
- Alteração das quantidades e opção para limpar o carrinho.
- Formulário para finalizar pedido ou solicitar orçamento, com dados de contato, pagamento e mensagem.
- Página de resultado após o envio do formulário.

## Requisitos

- Servidor web local com suporte a PHP. O projeto pode ser executado com XAMPP (Apache e PHP).
- Navegador com JavaScript e `localStorage` habilitados.

## Como executar no XAMPP

1. Copie a pasta `Fit-Pulse` para a pasta `htdocs` do XAMPP.
2. Inicie o Apache pelo painel de controle do XAMPP.
3. Abra `http://localhost/Fit-Pulse/` no navegador.
4. Navegue pelos produtos, adicione itens ao carrinho e acesse **Carrinho** no menu para revisar ou finalizar o pedido.

O conteúdo do carrinho fica armazenado no navegador utilizado. Ele não é compartilhado entre navegadores ou dispositivos.

## Fluxo de compra

1. Encontre um produto no catálogo ou abra sua página de detalhes.
2. Use **Adicionar ao carrinho**.
3. Acesse **Carrinho** no menu para conferir os itens, ajustar quantidades, limpar o carrinho ou continuar comprando.
4. Escolha **Finalizar pedido** para abrir o formulário com os itens selecionados.
5. Preencha seus dados e envie a solicitação. Também é possível escolher a opção de orçamento no formulário.

## Estrutura do projeto

```text
Fit-Pulse/
├── index.php                 Página inicial
├── produtos.php              Catálogo, busca e filtros
├── produto.php               Detalhes do produto selecionado
├── carrinho.php              Resumo e ações do carrinho
├── contato.php               Formulário de pedido ou orçamento
├── processa.php              Validação e processamento do formulário
├── inc/
│   ├── cabecalho.php          Cabeçalho e navegação compartilhados
│   ├── dados.php              Catálogo e funções compartilhadas
│   └── rodape.php             Rodapé e carregamento de scripts
├── css/
│   └── style.css              Estilos do site
├── js/
│   ├── carrinho.js            Persistência e contador do carrinho
│   ├── contato.js             Itens e total no formulário
│   ├── pagina-carrinho.js     Interações da página do carrinho
│   ├── produtos.js            Busca e filtro do catálogo
│   └── home.js                Carrossel da página inicial
└── img/                       Logo, banners e imagens dos produtos
```

## Observações

- Os dados dos produtos são definidos em `inc/dados.php`.
- As quantidades do carrinho são guardadas localmente pelo navegador. Limpar os dados do site no navegador também remove o carrinho.
- O projeto é demonstrativo; o envio do formulário apresenta o resultado da solicitação e não realiza cobrança ou integração com meios de pagamento.
