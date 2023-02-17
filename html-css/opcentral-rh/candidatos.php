<?php

session_start();

// se usuario nao registrado, redireciona p/ validacao

if (!isset($_SESSION['usu']))

	header("Location: index.php?op=err");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Central &amp; Opção Atacadista">
	<meta name="author" content="Lucas Sales">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<script src="https://kit.fontawesome.com/1f76937ee1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/logoarcos.png" />

	<link rel="canonical" href="https://devla.com.br" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
	<title>Opcentral</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
						<a class="sidebar-link" href="candidatos.php">
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
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
								<a class="dropdown-item" href="index.php">Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3">Painel de Candidatos</h1>
					<div class="h3 mb-3" style="text-align: right;">
						<a class="btn btn-success" title="Ver Todos" style="color:#fff" href="todosCandidatos.php" role="button">
							<b>Ver todos os candidatos</b>&nbsp;
						</a>
					</div>

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
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="www.opcaoatacadista.com.br" target="_blank"><strong>OPCentral</strong></a> - <a class="text-muted" href="https://www.opcaoatacadista.com.br/" target="_blank"><strong>Tecnologia & Inovação | 2023</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://192.168.2.202/suporte" target="_blank">Suporte</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>

<script>
	function viaCEP() {

		var numCep = $("#cep").val();

		var url = "https://viacep.com.br/ws/" + numCep + "/json";

		$.ajax({
			url: url,
			type: "get",
			dataType: "json",

			success: function(dados) {
				console.log(dados);
				$("#uf").val(dados.uf);
				$("#cidade").val(dados.localidade);
				$("#logradouro").val(dados.logradouro);
				$("#bairro").val(dados.bairro);
			}
		})


	}
</script>
<!-- Importação do Jquery Mask -->
<!-- include da importação da mascara dos inputs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<script type="text/javascript">
	$("#telefone, #celular").mask("(00) 00000-0000"); //000 000 0000 eua
	$('.date').mask('00/00/0000');
	$('.time').mask('00:00:00');
	$('.date_time').mask('00/00/0000 00:00:00');
	$('.cep').mask('00000-000');
	$('.phone').mask('0000-0000');
	$('.phone_with_ddd').mask('(00) 0000-0000');
	$('.phone_us').mask('(000) 000-0000');
	$('.mixed').mask('AAA 000-S0S');
	$('.cpf').mask('000.000.000-00', {
		reverse: true
	});
	$('.cnpj').mask('00.000.000/0000-00', {
		reverse: true
	});
	$('.money').mask('000.000.000.000.000,00', {
		reverse: true
	});
	$('.money2').mask("#.##0,00", {
		reverse: true
	});
	$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
		translation: {
			'Z': {
				pattern: /[0-9]/,
				optional: true
			}
		}
	});
	$('.ip_address').mask('099.099.099.099');
	$('.percent').mask('##0,00%', {
		reverse: true
	});
	$('.clear-if-not-match').mask("00/00/0000", {
		clearIfNotMatch: true
	});
	$('.placeholder').mask("00/00/0000", {
		placeholder: "__/__/____"
	});
	$('.fallback').mask("00r00r0000", {
		translation: {
			'r': {
				pattern: /[\/]/,
				fallback: '/'
			},
			placeholder: "__/__/____"
		}
	});
	$('.selectonfocus').mask("00/00/0000", {
		selectOnFocus: true
	});
</script>


<script type="text/javascript">
	$("#cpfcnpj").keydown(function() {
		try {
			$("#cpfcnpj").unmask();
		} catch (e) {}

		var tamanho = $("#cpfcnpj").val().length;

		if (tamanho < 11) {
			$("#cpfcnpj").mask("999.999.999-99");
		} else {
			$("#cpfcnpj").mask("99.999.999/9999-99");
		}

		// ajustando foco
		var elem = this;
		setTimeout(function() {
			// mudo a posição do seletor
			elem.selectionStart = elem.selectionEnd = 10000;
		}, 0);
		// reaplico o valor para mudar o foco
		var currentValue = $(this).val();
		$(this).val('');
		$(this).val(currentValue);
	});
</script>