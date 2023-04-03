<?php

session_start();

// se usuario nao registrado, redireciona p/ validacao

if (!isset($_SESSION['usu']))

	header("Location: index.php?op=err");
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

					<li class="sidebar-item">
						<a class="sidebar-link" href="financeiro.php">
							<i class="feather-dollar-sign"></i><span class="align-middle">Financeiro</span>
						</a>
					</li>

					<li class="sidebar-item active">
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
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0" style="text-align: center; justify-content: center;">
											<h1>Logística</h1>
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