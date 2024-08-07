<?php

session_start();

// se usuario nao registrado, redireciona p/ validacao

if (!isset($_SESSION['usu']))

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
        <a href="vendas.php" class="menu-lateral__link">Vendas</a>
        <a href="financeiro.php" class="menu-lateral__link">Financeiro</a>
        <a href="logistica.php" class="menu-lateral__link menu-lateral__link--ativo">Logística</a>
    </nav>

    <main class="principal">
        <div class="quadro-resumo">
            <article class="card_vendas-dash1">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Caminhões em Rota</p>
                    <h3 class="card-titulo2-resumohoje red">
                        <?php
                        $sql = ("SELECT * FROM
                          (SELECT COUNT (codveiculo)QT_VEICULO_ATIVO
                          FROM pcveicul
                          WHERE situacao     <> 'I'
                          AND codveiculo NOT IN (0,1, 267)
                          ) veiculo_ativo,
                          (SELECT COUNT (DISTINCT (codveiculo)) EMROTA
                          FROM pccarreg
                          WHERE dtfecha      IS NULL
                          AND destino NOT    IN ( 'VENDA BALCAO', 'CANCELADO')
                          AND codveiculo NOT IN (0,1,267)
                          AND dtsaida  >= '01-out-2022'
                          )veiculo_viagem");

                        $stid = oci_parse($conexao, $sql);
                        $execute = oci_execute($stid);

                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            // Use the uppercase column names for the associative array indices
                            echo $row['EMROTA'];
                        }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-dash2">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumohoje">Caminhões Livres</p>
                    <h3 class="card-titulo2-resumohoje red">
                        <?php
                        $sql = ("SELECT * FROM
                          (SELECT COUNT (codveiculo) ATIVOS
                          FROM pcveicul
                          WHERE situacao     <> 'I'
                          AND codveiculo NOT IN (0,1, 267)
                          ) veiculo_ativo,
                          (SELECT COUNT (DISTINCT (codveiculo)) EMROTA
                          FROM pccarreg
                          WHERE dtfecha      IS NULL
                          AND destino NOT    IN ( 'VENDA BALCAO', 'CANCELADO')
                          AND codveiculo NOT IN (0,1,267)
                          AND dtsaida  >= '01-out-2022'
                          )veiculo_viagem");

                        $stid = oci_parse($conexao, $sql);
                        $execute = oci_execute($stid);

                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            // Use the uppercase column names for the associative array indices
                            echo $row['ATIVOS'] - $row['EMROTA'];
                        }
                        ?>
                    </h3>
                </div>
            </article>
            <article class="card_vendas-dash3">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Palmas/Maraba</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                        $sql = ("SELECT 'PALMAS_MARABA', 
                        count (ped.numped)qtd_ped,
                        SUM (ped.vlatend)VLTOTROTA,
                          SUM(distinct (r.vlmincarreg))VLMINROTAS  ,
                        ROUND (((SUM (ped.vlatend)/SUM(distinct (r.vlmincarreg)))*100),2) PERCMIN,
                        COUNT(ped.posicao) TOTPEDIDOS
                      FROM pcclient c
                      JOIN pcpraca p
                      ON p.codpraca = c.codpraca
                      JOIN pcrotaexp r
                      ON r.codrota = p.rota
                      JOIN pcpedc ped
                      ON ped.codcli     = c.codcli
                      WHERE ped.posicao = 'L' and r.codrota in (46,36) GROUP BY 'PALMAS_MARABA'");

                        $stid = oci_parse($conexao, $sql);
                        $execute = oci_execute($stid);

                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            // Use the uppercase column names for the associative array indices
                            echo $row['PERCMIN'] . '%';
                        }
                        ?>
                    </h3>
                    <p class="card-subtitulo">
                        <?php
                        $stid = oci_parse($conexao, $sql);
                        $execute = oci_execute($stid);
                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            // Use the uppercase column names for the associative array indices
                            echo $row['TOTPEDIDOS'] . ' pedidos';
                        }
                        ?>
                    </p>
                </div>
            </article>
            <article class="card_vendas-dash4">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Posse/Goiás Velho</p>
                    <h3 class="card-titulo2-resumo">
                        <?php
                        $sql = ("SELECT 'POSSE_GOIASVELHO', 
                        count (ped.numped)qtd_ped,
                        SUM (ped.vlatend)VLTOTROTA,
                        SUM(distinct (r.vlmincarreg))VLMINROTAS  ,
                        ROUND (((SUM (ped.vlatend)/SUM(distinct (r.vlmincarreg)))*100),2) PercMin,
                        COUNT(ped.posicao) TOTPEDIDOS
                      FROM pcclient c
                      JOIN pcpraca p
                      ON p.codpraca = c.codpraca
                      JOIN pcrotaexp r
                      ON r.codrota = p.rota
                      JOIN pcpedc ped
                      ON ped.codcli     = c.codcli
                      WHERE ped.posicao = 'L' and r.codrota in (31,32) GROUP BY '1', 'POSSE_GOIASVELHO'");

                        $stid = oci_parse($conexao, $sql);
                        $execute = oci_execute($stid);

                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            // Use the uppercase column names for the associative array indices
                            echo $row['PERCMIN'] . '%';
                        }
                        ?>
                    </h3>
                    <p class="card-subtitulo">
                        <?php
                        $stid = oci_parse($conexao, $sql);
                        $execute = oci_execute($stid);
                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            // Use the uppercase column names for the associative array indices
                            echo $row['TOTPEDIDOS'] . ' pedidos';
                        }
                        ?>
                    </p>
                </div>
            </article>
            <article class="card_vendas-dash5">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Teste3</p>
                    <h3 class="card-titulo2-resumo">
                        000
                    </h3>
                </div>
            </article>
            <article class="card_vendas-dash6">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Teste4</p>
                    <h3 class="card-titulo2-resumo">
                        000
                    </h3>
                </div>
            </article>
            <article class="card_vendas-dash7">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Teste5</p>
                    <h3 class="card-titulo2-resumo">
                        000
                    </h3>
                </div>
            </article>
            <article class="card_vendas-dash8">
                <div class="card-texto-resumo">
                    <p class="card-titulo1-resumo">Teste6</p>
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