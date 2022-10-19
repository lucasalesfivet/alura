<?php include 'connect/conexao.php'; ?>
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
    <script type="text/JavaScript">
         function doLoad()
            {
                setTimeout( "refresh()", 50*1000 );
            }

            function refresh()
            {
                window.location.href = window.location;
            }
        */
    </script>
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
        <a href="vendas-resumo.php" class="menu-lateral__link">Vendas</a>
        <a href="financeiro.php" class="menu-lateral__link menu-lateral__link--ativo">Financeiro</a>
        <a href="logistica.html" class="menu-lateral__link">Logística</a>
    </nav>

    <main class="principal">
        <div class="quadro-resumo">
        <article class="card_vendas-resumo7">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Total de Pedidos</p>
                    <h3 class="card-titulo2-resumohoje">
                        <?php
                        $sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and codcob <> 'BNF'");

                        $stid = oci_parse($conexao, $sql);
                        $execute = oci_execute($stid);

                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            // Use the uppercase column names for the associative array indices
                            echo $row['NUMPED'];
                        }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo8">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Pedidos em Análise</p>
                    <h3 class="card-titulo2-resumohoje red">
                        <?php
                            $sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and posicao in ('B') and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);
    
                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMPED'];
                            }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo1">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Pedidos Bloqueados</p>
                    <h3 class="card-titulo2-resumo red">
                    <?php
                            $sql = ("SELECT count(*) NUMPED FROM pcpedc WHERE data BETWEEN '01-out-2022' AND '31-out-2022' and posicao in ('B') and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);
    
                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMPED'];
                            }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo2">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Contas a Pagar</p>
                    <h3 class="card-titulo2-resumo">
                        000
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo3">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Contas a Receber</p>
                    <h3 class="card-titulo2-resumo">
                        000
                    </h3>
                </div>
            </article>
            
        </div>
    </main>


    <script src="index.js"></script>
</body>

</html>