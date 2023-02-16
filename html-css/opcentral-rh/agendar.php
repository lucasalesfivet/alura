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
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="icon" href="img/logoarcos.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>OPCentral</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
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

					<li class="sidebar-item">
						<a class="sidebar-link" href="candidatos.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Candidatos</span>
						</a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="agendar.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Agendar</span>
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

					<h1 class="h3 mb-3">Agendar Candidato</h1>


					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form action="cadastroCliente.php" enctype='multipart/form-data' method='post'>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
										<input type="text" class="form-control" id="exampleFormControlInput1" name='nome' required autocomplete="off">
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">E-mail</label>
										<input type="mail" class="form-control" id="exampleFormControlInput1" name='mail' required autocomplete="off">
									</div>
									<div class="row">
										<div class="col-4">
											<label for="exampleFormControlInput1" class="form-label">Telefone</label>
											<input type="text" class="form-control" id="telefone" name="telefone" required autocomplete="off">
										</div>
										<div class="col-8">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Cargo</label>
												<input type="text" class="form-control" name='logradouro' id="logradouro" required autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											<label for="exampleFormControlInput1" class="form-label">CEP</label>
											<input type="text" class="form-control" id="cep" name='cep' maxlength="8" onkeyup="viaCEP()" required autocomplete="off">
										</div>
										<div class="col-8">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Logradouro</label>
												<input type="text" class="form-control" name='logradouro' id="logradouro" required autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-2">
											<label for="exampleFormControlInput1" class="form-label">Nº</label>
											<input type="text" class="form-control" name='numero' id="exampleFormControlInput1" required autocomplete="off">
										</div>
										<div class="col-10">
											<label for="exampleFormControlInput1" class="form-label">Complemento</label>
											<input type="text" class="form-control" name='complemento' id="exampleFormControlInput1" required autocomplete="off">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-5">
											<label for="exampleFormControlInput1" class="form-label">Bairro</label>
											<input type="text" class="form-control" name='bairro' id="bairro" required autocomplete="off">
										</div>
										<div class="col-5">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Cidade</label>
												<input type="text" class="form-control" name='cidade' id="cidade" required autocomplete="off">
											</div>
										</div>
										<div class="col-2">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Estado</label>
												<input type="text" class="form-control" name='uf' id="uf" required autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-5">
											<label for="exampleFormControlInput1" class="form-label">Data</label>
											<input type="number" class="form-control" name='data' id="data" required autocomplete="off">
										</div>
										<div class="col-4">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Hora</label>
												<input type="number" class="form-control" name='hora' id="hora" required autocomplete="off">
											</div>
										</div>
									</div>

									<div style="text-align: right;">
										<button type="submit" class="btn btn-primary">Agendar</button>
									</div>
									<form>
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

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>