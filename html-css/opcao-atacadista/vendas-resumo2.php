<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>OPCentral</title>
    <link rel="icon" href="img/logoarcos.png" />
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
        <button type="button" class="cabecalho__botao-usuario"></button>
    </header>

    <nav class="menu-lateral">
        <img src="img/logoquadrada.png" alt="Logotipo da Opção" class="menu-lateral__logo">
        <h3 class="menu-lateral__titulo">Diretoria</h3>
        <a href="home.html" class="menu-lateral__link">Início</a>
        <a href="vendas.html" class="menu-lateral__link menu-lateral__link--ativo">Vendas</a>
        <a href="financeiro.html" class="menu-lateral__link">Financeiro</a>
        <a href="logistica.html" class="menu-lateral__link">Logística</a>
    </nav>

    <main class="principal">
        <div class="quadro-resumo">
            <article class="card_vendas-resumo1">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Pedidos Mês Atual</p>
                    <h3 class="card-titulo2-resumo">27.604</h3>
                </div>
            </article>
            <article class="card_vendas-resumo2">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Devoluções Mês Atual</p>
                    <h3 class="card-titulo2-resumo">170</h3>
                </div>
            </article>
            <article class="card_vendas-resumo3">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Faturamento Mês Atual</p>
                    <h3 class="card-titulo2-resumo">R$1,5 mi</h3>
                </div>
            </article>
            <article class="card_vendas-resumo4">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Pedidos Mês Anterior</p>
                    <h3 class="card-titulo2-resumo">29.411</h3>
                </div>
            </article>
            <article class="card_vendas-resumo5">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Devoluções Mês Anterior</p>
                    <h3 class="card-titulo2-resumo">211</h3>
                </div>
            </article>
            <article class="card_vendas-resumo6">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Faturamento Mês Anterior</p>
                    <h3 class="card-titulo2-resumo">R$1,8 mi</h3>
                </div>
            </article>
            <article class="card_vendas-resumo7">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Pedidos Hoje</p>
                    <h3 class="card-titulo2-resumohoje red">

                        <?php

                        $tns = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.2.197)(PORT = 1521)))(CONNECT_DATA =(SERVICE_NAME = wint)))";
                        $db_username = "CONSULTA";
                        $db_password = "CONSULTA";
                        try {
                            $conexao = new PDO("oci:dbname=" . $tns, $db_username, $db_password);
                        } catch (PDOException $e) {
                            echo ($e->getMessage());
                        }

                        $sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and posicao = 'L'");

                        $resultado = $conexao->prepare($sql);
                        $resultado->execute();

                        while ($res = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            echo $res['NUMPED'];
                        }
                  
                        ?>

                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo8">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Devoluções Hoje</p>
                    <h3 class="card-titulo2-resumohoje red">

                    </h3>
                </div>
            </article>
        </div>
    </main>


    <script src="index.js"></script>
</body>

</html>