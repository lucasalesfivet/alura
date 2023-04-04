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

					<li class="sidebar-item">
						<a class="sidebar-link" href="vendas.php">
							<i class="feather-trending-up"></i><span class="align-middle">Vendas</span>
						</a>
					</li>

					<li class="sidebar-item active">
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

					<h1 class="h3 mb-3"><strong>Financeiro</strong> Analytics</h1>


					<div class="row">
						<div class="col-sm-6">
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
										$sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and codcob <> 'BNF'");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo $row['NUMPED'];
										}
										?>
									</h1>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Pedidos em Análise</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="package"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and posicao in ('B') and codcob <> 'BNF'");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo $row['NUMPED'];
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
											<h5 class="card-title">Pedidos Bloqueados</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="lock"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = ("SELECT count(*) NUMPED FROM pcpedc WHERE data BETWEEN (trunc(SYSDATE)-30) AND (trunc(SYSDATE)) and posicao in ('B') and codcob <> 'BNF'");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo $row['NUMPED'];
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
											<h5 class="card-title">Carregamentos em Aberto</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="truck"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = ("SELECT count(*) as TOT_CARREG_ABERTO FROM pccarreg WHERE dtfat between '01-abril-2023' and (trunc(SYSDATE))
                            			and dtfecha is null");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo $row['TOT_CARREG_ABERTO'];
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
											<h5 class="card-title">Carregamento +10 dias</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="alert-octagon"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = ("SELECT count(*) as TOT_CARREG_DEZ FROM pccarreg
										WHERE dtfat between '01-abril-2023' and (trunc(SYSDATE)-10)
										and totpeso <> 0
										and dtfecha is null");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo $row['TOT_CARREG_DEZ'];
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
											<h5 class="card-title">I N A D I M P L Ê N C I A</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="alert-triangle"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = ("SELECT ROUND(((inad.VLINADIPLENCIA/ prev.VLPREVISOT) *100),2) PERC_INAD
										FROM
										(SELECT SUM (valor)VLINADIPLENCIA
										FROM pcprest
										WHERE dtvenc BETWEEN (trunc(SYSDATE)-366) AND (trunc(SYSDATE)-31)
										AND dtpag IS NULL
										) INAD,
										(SELECT SUM (valor)VLPREVISOT
										FROM pcprest
										WHERE dtvenc BETWEEN (trunc(SYSDATE)-366) AND (trunc(SYSDATE)-31)
										AND codcob NOT IN ('DEVP', 'DEVT', 'BNF', 'BNFT', 'BNFR', 'BNTR', 'BNRP', 'CRED', 'DESD'))PREV");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo '0' . $row['PERC_INAD'] . '%';
										}
										?>
									</h1>
									<div class="mb-0">
										<span class="text-muted">Últimos 12 meses +30dias</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">I N A D I M P L Ê N C I A</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="alert-triangle"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = ("SELECT ROUND(((inad.VLINADIPLENCIA/ prev.VLPREVISOT) *100),2) PERC_INAD
										FROM
										(SELECT SUM (valor)VLINADIPLENCIA
										FROM pcprest
										WHERE dtvenc BETWEEN '01-out-2010' AND (trunc(SYSDATE)-60)
										AND dtpag IS NULL
										) INAD,
										(SELECT SUM (valor)VLPREVISOT
										FROM pcprest
										WHERE dtvenc BETWEEN '01-out-2010' AND (trunc(SYSDATE)-60)
										AND codcob NOT IN ('DEVP', 'DEVT', 'BNF', 'BNFT', 'BNFR', 'BNTR', 'BNRP', 'CRED', 'DESD'))PREV");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo '0' . $row['PERC_INAD'] . '%';
										}
										?>
									</h1>
									<div class="mb-0">
										<span class="text-muted">Total +60 dias</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">I N A D I M P L Ê N C I A</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="alert-triangle"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = ("SELECT ROUND(((inad.VLINADIPLENCIA/ prev.VLPREVISOT) *100),2) PERC_INAD
										FROM
											(SELECT SUM (valor)VLINADIPLENCIA
											FROM pcprest
											WHERE dtvenc BETWEEN '01-mar-2022' AND '30-mar-2022'
											AND dtpag IS NULL
											) INAD,
											(SELECT SUM (valor)VLPREVISOT
											FROM pcprest
											WHERE dtvenc BETWEEN '01-mar-2022' AND '30-mar-2022'
											AND codcob NOT IN ('DEVP', 'DEVT', 'BNF', 'BNFT', 'BNFR', 'BNTR', 'BNRP', 'CRED', 'DESD'))PREV");

										$stid = oci_parse($conexao, $sql);
										$execute = oci_execute($stid);

										while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
											// Use the uppercase column names for the associative array indices
											echo '0' . $row['PERC_INAD'] . '%';
										}
										?>
									</h1>
									<div class="mb-0">
										<span class="text-muted">Março/2023</span>
									</div>
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
	<script>
		feather.replace()
	</script>

</body>

</html>