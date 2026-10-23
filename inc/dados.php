<?php
// lista de produtos, usada nas páginas e no processa.php
$produtos = [
    'estacao'   => ['nome' => 'Estação de Musculação',        'desc' => 'Equipamento completo para treino de força em casa.',       'cat' => 'Equipamentos', 'preco' => 2499.90, 'antigo' => 2799.90, 'img' => 'aparelho.png'],
    'kettlebell'=> ['nome' => 'Kettlebell Digital',           'desc' => 'Peso com display que mostra a carga do treino.',           'cat' => 'Equipamentos', 'preco' => 349.90,  'antigo' => 429.90,  'img' => 'peso.png'],
    'faixa'     => ['nome' => 'Faixa Elástica de Resistência','desc' => 'Ideal para exercícios de mobilidade e fortalecimento.',    'cat' => 'Equipamentos', 'preco' => 59.90,   'antigo' => 79.90,   'img' => 'corda.png'],
    'corda'     => ['nome' => 'Corda de Pular Inteligente',   'desc' => 'Conta saltos e calorias direto no cabo.',                  'cat' => 'Equipamentos', 'preco' => 129.90,  'antigo' => 159.90,  'img' => 'corda2.png'],
    'rolo'      => ['nome' => 'Rolo de Massagem',             'desc' => 'Auxilia na recuperação muscular após o treino.',           'cat' => 'Equipamentos', 'preco' => 89.90,   'antigo' => 109.90,  'img' => 'borracha.png'],
    'garrafa'   => ['nome' => 'Garrafa Shaker Térmica',       'desc' => 'Mantém a bebida gelada e mistura seu suplemento.',         'cat' => 'Acessórios',   'preco' => 79.90,   'antigo' => 99.90,   'img' => 'garrafa.png'],
    'fone'      => ['nome' => 'Fone de Ouvido Esportivo',     'desc' => 'Resistente ao suor, com conexão sem fio.',                 'cat' => 'Acessórios',   'preco' => 199.90,  'antigo' => 249.90,  'img' => 'fone.png'],
    'tenis'     => ['nome' => 'Tênis de Treino',              'desc' => 'Leve e confortável para corrida e treino funcional.',      'cat' => 'Calçados',     'preco' => 399.90,  'antigo' => 499.90,  'img' => 'tenis.png'],
];

function real($v) { return 'R$ ' . number_format($v, 2, ',', '.'); }
function h($s)    { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
