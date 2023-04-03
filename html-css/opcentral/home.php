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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="home.php">
							<i class="feather-sliders"></i><span class="align-middle">Início</span>
						</a>
					</li>

					<li class="sidebar-item">
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
					<h1 class="h3 mb-3"><strong>Início</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Pedidos</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="activity"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php
													$sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE) and posicao in ('L','M','F','B') and codcob <> 'BNF'");

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
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Pedidos em Análise</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="alert-circle"></i>
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
									<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Pedidos Faturados</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php
													$sql = ("SELECT count(*) NUMNOTA FROM pcnfsaid WHERE dtfat = trunc(SYSDATE) and codcob <> 'BNF'");

													$stid = oci_parse($conexao, $sql);
													$execute = oci_execute($stid);

													while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
														// Use the uppercase column names for the associative array indices
														echo $row['NUMNOTA'];
													}
													?>
												</h1>
											</div>
										</div>

										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Carregamentos em Aberto</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="clipboard"></i>
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
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Caminhões em Rota</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
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
												</h1>
											</div>
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