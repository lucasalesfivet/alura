<?php

session_start();

// se usuario nao registrado, redireciona p/ validacao

if (!isset($_SESSION['usu']))

	header("Location: index.php?op=err");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include 'header.php' ?>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<img src="img/logoquadrada.png" alt="Logotipo da Opção" class="menu-lateral__logo">
				<a class="sidebar-brand" href="home.php">
					<span class="align-middle">OPCentral</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Módulo RH
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="home.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Início</span>
						</a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="todosCandidatos.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Candidatos</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="agendar.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Cadastrar</span>
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
								<a class="dropdown-item" href="candidatos.php"><i class="align-middle me-1" data-feather="monitor"></i> Painel</a>
								<a class="dropdown-item" href="index.php">Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3">Painel de Candidatos</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Cadastrados</h5>
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Nome</th>
												<th scope="col">Telefone</th>
												<th scope="col">Cargo</th>
												<th scope="col">Data</th>
												<th scope="col">hora</th>
												<th scope="col">Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include 'connect/conexao.php';
											$sql = "SELECT * FROM opcagendcand WHERE dtcancelado is null and dtatendido is null and dtconfirmado is null";
											$busca = mysqli_query($conexaoopc, $sql);
											while ($dados = mysqli_fetch_array($busca)) {;
												$id = $dados['id'];
												$nome = $dados['nome'];
												$telefone = $dados['telefone'];
												$cargo = $dados['cargo'];
												$data = $dados['data'];
												$hora = $dados['hora'];
											?>
												<tr>
													<td><?php echo $nome ?></td>
													<td><?php echo $telefone ?></td>
													<td><?php echo $cargo ?></td>
													<td><?php echo $data ?></td>
													<td><?php echo $hora ?></td>
													<td>
														<a class="btn btn-success" title="Confirmar Agendamento" style="color:#fff" href="confirmarAgendamento.php?id=<?php echo $id ?>" role="button">
															<i class="fa-solid fa-check"></i>&nbsp;
														</a>
														<a class="btn btn-danger" title="Cancelar Agendamento" style="color:#fff" href="cancelarAgendamento.php?id=<?php echo $id ?>" role="button">
															<i class="fa-solid fa-xmark"></i>
														</a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Atendidos</h5>
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Nome</th>
												<th scope="col">Cargo</th>
												<th scope="col">Ver +</th>

											</tr>
										</thead>
										<tbody>
											<?php
											include 'connect/conexao.php';
											$sql = "SELECT * FROM opcagendcand WHERE dtatendido is not null order by dtatendido desc";
											$busca = mysqli_query($conexaoopc, $sql);
											while ($dados = mysqli_fetch_array($busca)) {;
												$id = $dados['id'];
												$nome = $dados['nome'];
												$cargo = $dados['cargo'];
											?>
												<tr>
													<td><?php echo $nome ?></td>
													<td><?php echo $cargo ?></td>
													<td>
														<a class="btn btn-alert" title="Ver mais" style="color: grey" href="verAtendido.php?id=<?php echo $id ?>" role="button">
															<i class="fa-solid fa-magnifying-glass-plus"></i>
														</a>
													</td>
												</tr>
											<?php } ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Cancelados</h5>
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Nome</th>
												<th scope="col">Cargo</th>
												<th scope="col">Ver +</th>

											</tr>
										</thead>
										<tbody>
											<?php
											include 'connect/conexao.php';
											$sql = "SELECT * FROM opcagendcand WHERE dtcancelado is not null order by dtcancelado desc";
											$busca = mysqli_query($conexaoopc, $sql);
											while ($dados = mysqli_fetch_array($busca)) {;
												$id = $dados['id'];
												$nome = $dados['nome'];
												$cargo = $dados['cargo'];
											?>
												<tr>
													<td><?php echo $nome ?></td>
													<td><?php echo $cargo ?></td>
													<td>
														<a class="btn btn-alert" title="Ver mais" style="color: grey" href="verCancelado.php?id=<?php echo $id ?>" role="button">
															<i class="fa-solid fa-magnifying-glass-plus"></i>
														</a>
													</td>
												</tr>
											<?php } ?>

										</tbody>
									</table>
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