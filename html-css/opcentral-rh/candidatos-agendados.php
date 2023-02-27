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
				<a class="sidebar-brand" href="">
					<span class="align-middle">OPCentral</span>
				</a>

				<ul class="sidebar-nav">

					<li class="sidebar-header">
						Módulo RH
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="#">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Início</span>
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
            </nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Painel</strong> Candidatos Agendados</h1>


					<div class="row">
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
                                        include 'connect/conexao.php';
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
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include 'connect/conexao.php';
										$sql = "SELECT * FROM opcagendcand WHERE data = curdate() order by hora";
										$busca = mysqli_query($conexaoopc, $sql);
										while ($dados = mysqli_fetch_array($busca)) {;
											$id = $dados['id'];
											$nome = $dados['nome'];
											$telefone = $dados['telefone'];
											$cargo = $dados['cargo'];
											$hora = $dados['hora'];
											$dtcancelado = $dados['dtcancelado'];
                                            $dtatendido = $dados['dtatendido'];
										?>
											<tr>
												<td><?php echo $nome ?></td>
												<td><?php echo $telefone ?></td>
												<td><?php echo $cargo ?></td>
												<td><?php echo $hora ?></td>
												<td>
													<?php
                                                        if ($dtatendido > 1) { ?>
                                                            <class="" style="color: green">Atendido</class>
                                                        <?php } elseif ($dtcancelado > 1) { ?>
                                                            <class="" style="color: #B22222">Cancelado</class=>
                                                        <?php } else { ?>
                                                            <class="" style="color: #191970">Agendado</class=>
                                                        <?php }
                                                    ?>
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