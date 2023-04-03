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

    <?php include 'header.php'; ?>

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <img src="img/logoquadrada.png" alt="Logotipo da Opção" class="menu-lateral__logo">

                <ul class="sidebar-nav">

                    <li class="sidebar-header">
                        OPCentral
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="home.php">
                            <i class="feather-sliders"></i><span class="align-middle">Início</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="vendas.php">
                            <i class="feather-trending-up"></i><span class="align-middle">Vendas</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="financeiro.php">
                            <i class="feather-dollar-sign"></i><span class="align-middle">Financeiro</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="logistica.php">
                            <i class="feather-package"></i><span class="align-middle">Logística</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark">Mais</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href=""><i class="align-middle me-1" data-feather="monitor"></i> Painel</a>
                                <a class="dropdown-item" href="index.php">Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Vendas</strong> Analytics</h1>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total de Pedidos</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="package"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?php
                                        $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-abril-2023' AND '30-abril-2023' and codcob <> 'BNF'");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo $row['NUMNOTA'];
                                        }
                                        ?>
                                    </h1>
                                    <div class="mb-0">
                                        <span class="text-muted">mês atual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total de Pedidos</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="package"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?php
                                        $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-mar-2023' AND '31-mar-2023' and codcob <> 'BNF'");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo $row['NUMNOTA'];
                                        }
                                        ?>
                                    </h1>
                                    <div class="mb-0">
                                        <span class="text-muted">mês anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total de Pedidos</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="package"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?php
                                        $sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat BETWEEN '01-abril-2022' AND '30-abril-2022' and codcob <> 'BNF'");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo $row['NUMNOTA'];
                                        }
                                        ?>
                                    </h1>
                                    <div class="mb-0">
                                        <span class="text-muted">mês atual/ano anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Faturamento</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-abril-2023' and '30-abril-2023' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$' . $row['VALOR'];
                                        }
                                        ?>
                                    </h1>
                                    <div class="mb-0">
                                        <span class="text-muted">mês atual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Faturamento</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-mar-2023' and '31-mar-2023' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$' . $row['VALOR'];
                                        }
                                        ?>
                                    </h1>
                                    <div class="mb-0">
                                        <span class="text-muted">mês anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Faturamento</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FATANTERIOR FROM pcnfsaid where dtfat between '01-abril-2022' and '30-abril-2022' and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM PCNFSAID where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$' . $row['VALOR'];
                                        }
                                        ?>
                                    </h1>
                                    <div class="mb-0">
                                        <span class="text-muted">mês atual/ano anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h1 class="h3 mb-3"><strong>Valor</strong> de Vendas</h1>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                        <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$' . $row['VALOR'];
                                        }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 50</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 50
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 100</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 100
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 200</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 200
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 300</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 300
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 400</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 400
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 500</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 500
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 600</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 600
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 700</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 700
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">SUP 800</h5>
                                        </div>
                                    </div><br>
                                    <h1 class="mt-1 mb-3">
                                    <?php
                                        $sql = ("SELECT TO_CHAR((SELECT round(SUM(vltotal)) as FAT FROM pcpedc 
                                        where data = trunc(SYSDATE)
                                        and codsupervisor = 800
                                        and codcob <> 'BNF'),'FM999G999G999G999') as VALOR FROM
                                        pcpedc where rownum = 1");

                                        $stid = oci_parse($conexao, $sql);
                                        $execute = oci_execute($stid);

                                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                            // Use the uppercase column names for the associative array indices
                                            echo 'R$'.$row['VALOR'];
                                        }
                                    ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <footer class="footer">
                <?php include 'footer.php' ?>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>