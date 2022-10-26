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
    <link rel="icon" href="img/logoarcos.png" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script>
        function autoRefresh() {
            window.location = window.location.href;
        }
        setInterval('autoRefresh()', 60000);
    </script>
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
        <a href="vendas-resumo.php" class="menu-lateral__link menu-lateral__link--ativo">Vendas</a>
        <a href="financeiro.php" class="menu-lateral__link">Financeiro</a>
        <a href="logistica.html" class="menu-lateral__link">Logística</a>
    </nav>

    <main class="principal">
        <div class="quadro-resumo">
        <article class="card_vendas-resumo7">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Pedidos Hoje</p>
                    <h3 class="card-titulo2-resumohoje red">
                        <?php
                        $sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and posicao in ('L','M','F') and codcob <> 'BNF'");

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
                    <p class="card-titulo1-resumohoje">Pedidos Faturados</p>
                    <h3 class="card-titulo2-resumohoje red">
                        <?php
                            $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat = trunc(SYSDATE) and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);
    
                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMNOTA'];
                            }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo1">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Pedidos Bloqueados</p>
                    <h3 class="card-titulo2-resumo">
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
            <article class="card_vendas-resumo2">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Pedidos Mês Atual</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-out-2022' AND '31-out-2022' and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMNOTA'];
                            }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo3">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Faturamento Mês Atual</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-out-2022' and '31-out-2022' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo 'R$'.$row['VALOR'];
                            }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo4">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Total de Pedidos</p>
                    <h3 class="card-titulo2-resumo">
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
            <article class="card_vendas-resumo5">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Pedidos Mês Anterior</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-SET-2022' AND '30-SET-2022' and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMNOTA'];
                            }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-resumo6">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Faturamento Mês Anterior</p>
                    <h3 class="card-titulo2-resumo">
                    <?php
                            $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-set-2022' and '30-set-2022' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo 'R$'.$row['VALOR'];
                            }
                        ?>
                    </h3>
                </div>
            </article>
            
        </div>
    </main>


    <script src="index.js"></script>
</body>

</html>