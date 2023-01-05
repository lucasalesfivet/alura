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
        <h3 class="menu-lateral__titulo">OPCentral</h3>
        <a href="home.php" class="menu-lateral__link">Início</a>
        <a href="vendas.php" class="menu-lateral__link menu-lateral__link--ativo">Vendas</a>
        <a href="financeiro.php" class="menu-lateral__link">Financeiro</a>
        <a href="logistica.php" class="menu-lateral__link">Logística</a>
    </nav>

    <main class="principal">
        <div class="quadro-resumo">
        <article class="card_vendas-dash1">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Pedidos Feitos Hoje</p>
                    <h3 class="card-titulo2-resumohoje red">
                        <?php
                        $sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and posicao in ('L','M','F','B') and codcob <> 'BNF'");

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
            <article class="card_vendas-dash2">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Pedidos Faturados Hoje</p>
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
            <article class="card_vendas-dash3">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Total de Pedidos</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-jan-2023' AND '31-jan-2023' and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMNOTA'];
                            }
                        ?>
                    </h3>
                    <p class="card-titulo1-resumo subtitulo">mês atual</p>
                </div>
            </article>
            <article class="card_vendas-dash4">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Total de Pedidos</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-dez-2022' AND '31-dez-2022' and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMNOTA'];
                            }
                        ?>
                    </h3>
                    <p class="card-titulo1-resumo subtitulo">mês anterior</p>
                </div>
            </article>
            <article class="card_vendas-dash5">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Total de Pedidos</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-jan-2022' AND '31-jan-2022' and codcob <> 'BNF'");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo $row['NUMNOTA'];
                            }
                        ?>
                    </h3>
                    <p class="card-titulo1-resumo subtitulo">mês atual/ano anterior</p>
                </div>
            </article>
            <article class="card_vendas-dash6">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Faturamento</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-jan-2023' and '31-jan-2023' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo 'R$'.$row['VALOR'];
                            }
                        ?>
                    </h3>
                    <p class="card-titulo1-resumo subtitulo">mês atual</p>
                </div>
            </article>
            <article class="card_vendas-dash7">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Faturamento</p>
                    <h3 class="card-titulo2-resumo">
                    <?php
                            $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-dez-2022' and '31-dez-2022' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo 'R$'.$row['VALOR'];
                            }
                        ?>
                    </h3>
                    <p class="card-titulo1-resumo subtitulo">mês anterior</p>
                </div>
            </article>
            <article class="card_vendas-dash8">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Faturamento</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                            $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-jan-2022' and '31-jan-2022' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                            $stid = oci_parse($conexao, $sql);
                            $execute = oci_execute($stid);

                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                // Use the uppercase column names for the associative array indices
                                echo 'R$'.$row['VALOR'];
                            }
                        ?>
                    </h3>
                    <p class="card-titulo1-resumo subtitulo">mês atual/ano anterior</p>
                </div>
            </article>
            
        </div>
    </main>


    <script src="index.js"></script>
</body>

</html>