<?php 

session_start();

    // se usuario nao registrado, redireciona p/ validacao

    if(!isset($_SESSION['usu']))

    header("Location: index.php?op=err"); 

include 'connect/conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>OPCentral</title>
    <link rel="icon" href="img/logoarcos.png"/>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header class="cabecalho">
        <button type="button" class="cabecalho__botao-menu"></button>
        <img src="img/logotipo.png" alt="Logotipo da Opção" class="cabecalho__logo">
        <button type="button" class="cabecalho__botao-usuario"><a href="index.php" style="color: transparent;">sair</a></button>
    </header>

    <nav class="menu-lateral">
        <img src="img/logoquadrada.png" alt="Logotipo da Opção" class="menu-lateral__logo">
        <h3 class="menu-lateral__titulo">Diretoria</h3>
        <a href="home.php" class="menu-lateral__link">Início</a>
        <a href="vendas.php" class="menu-lateral__link menu-lateral__link--ativo">Vendas</a>
        <a href="financeiro.php" class="menu-lateral__link">Financeiro</a>
        <a href="logistica.php" class="menu-lateral__link">Logística</a>
    </nav>

    <main class="principal">
        <div class="quadro">
            <article class="card_vendas">
                <div class="card-texto">
                    <p class="card-titulo1">Painel de</p>
                    <h3 class="card-titulo2">Vendas</h3>
                </div>
            </article>
            <div class="card_vendas-botao-resumo">
                <div class="card_vendas-botao">
                    <a href="vendas-resumo.php" class="card_vendas-botao-resumo botao_resumo">Resumo atual</a>
                </div>
            </div>
            <div class="card_vendas-botao-dash">
                <div class="card_vendas-botao">
                    <a href="vendas-dashboard.php" class="card_vendas-botao-dash botao_resumo">Dashboard</a>
                </div>
            </div>
    </main>


    <script src="index.js"></script>
</body>

</html>