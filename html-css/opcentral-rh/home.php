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
				<a class="sidebar-brand" href="home.php">
					<span class="align-middle">OPCentral</span>
				</a>

				<ul class="sidebar-nav">

					<li class="sidebar-header">
						Módulo RH
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="home.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Início</span>
						</a>
					</li>

					<li class="sidebar-item">
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

					<h1 class="h3 mb-3"><strong>RH</strong> Início</h1>


					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Cadastrados</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										include 'connect/conexao.php';
										$sql = "SELECT COUNT(id) as total FROM opcagendcand";
										$busca = mysqli_query($conexaoopc, $sql);
										while ($dados = mysqli_fetch_array($busca)) {;
											$agendados = $dados['total'];
											echo $agendados;
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
											<h5 class="card-title">Hoje</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = "SELECT COUNT(id) as totalhoje FROM opcagendcand  WHERE data = curdate()";
										$busca = mysqli_query($conexaoopc, $sql);
										while ($dados = mysqli_fetch_array($busca)) {;
											$hoje = $dados['totalhoje'];
											echo $hoje;
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
											<h5 class="card-title">Atendidos</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = "SELECT COUNT(id) as atendidoshoje FROM opcagendcand  WHERE data = curdate() and dtatendido is not null";
										$busca = mysqli_query($conexaoopc, $sql);
										while ($dados = mysqli_fetch_array($busca)) {;
											$atendhoje = $dados['atendidoshoje'];
											echo $atendhoje;
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
											<h5 class="card-title">Cancelados</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$sql = "SELECT COUNT(id) as canceladoshoje FROM opcagendcand  WHERE data = curdate() and dtcancelado is not null";
										$busca = mysqli_query($conexaoopc, $sql);
										while ($dados = mysqli_fetch_array($busca)) {;
											$cancelhoje = $dados['canceladoshoje'];
											echo $cancelhoje;
										}
										?>
									</h1>
								</div>
							</div>
						</div>
					</div>


					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Candidatos confirmados para hoje</h5>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Nome</th>
											<th scope="col">Telefone</th>
											<th scope="col">Cargo</th>
											<th scope="col">Hora</th>
											<th scope="col" align="center">Confirmar</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include 'connect/conexao.php';
										$sql = "SELECT * FROM opcagendcand WHERE dtconfirmado is not null and data = curdate() order by hora";
										$busca = mysqli_query($conexaoopc, $sql);
										while ($dados = mysqli_fetch_array($busca)) {;
											$id = $dados['id'];
											$nome = $dados['nome'];
											$telefone = $dados['telefone'];
											$cargo = $dados['cargo'];	
											$hora = $dados['hora'];
										?>
											<tr>
												<td><?php echo $nome ?></td>
												<td><?php echo $telefone ?></td>
												<td><?php echo $cargo ?></td>
												<td><?php echo $hora ?></td>
												<td>
													<a class="btn btn-success" title="Confirmar" style="color:#fff" href="confirmarAtendimento.php?id=<?php echo $id ?>" role="button">
														<i class="fa-solid fa-check"></i>&nbsp;
													</a>
													<a class="btn btn-danger" title="Cancelar" style="color:#fff" href="cancelarAtendimento.php?id=<?php echo $id ?>" role="button">
														<i class="fa-solid fa-xmark"></i>&nbsp;
													</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Candidatos pendentes</h5>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Nome</th>
											<th scope="col">E-Mail</th>
											<th scope="col">Telefone</th>
											<th scope="col">Agendado para</th>
											<th scope="col">Ações</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include 'connect/conexao.php';
										$sql = "SELECT * FROM opcagendcand WHERE dtconfirmado is not null and data < curdate()";
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
												<td><?php echo $data.' '.$hora ?></td>
												<td>
													<a class="btn btn-success" title="Confirmar" style="color:#fff" href="confirmarAtendimento.php?id=<?php echo $id ?>" role="button">
														<i class="fa-solid fa-check"></i>&nbsp;
													</a>
													<a class="btn btn-danger" title="Cancelar" style="color:#fff" href="cancelarAtendimento.php?id=<?php echo $id ?>" role="button">
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
			</main>

			<footer class="footer">
				<?php include 'footer.php' ?>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>