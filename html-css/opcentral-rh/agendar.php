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

					<li class="sidebar-item">
						<a class="sidebar-link" href="todosCandidatos.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Candidatos</span>
						</a>
					</li>

					<li class="sidebar-item active">
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

					<h1 class="h3 mb-3">Cadastrar Candidato</h1>


					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form action="cadastrarAgendamento.php" enctype='multipart/form-data' method='post'>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
										<input type="text" class="form-control" id="exampleFormControlInput1" name='nome' maxlength="50" required autocomplete="off">
									</div>
									<div class="mb-3">
										<label for="exampleFormControlInput1" class="form-label">E-mail</label>
										<input type="mail" class="form-control" id="exampleFormControlInput1" name='mail' maxlength="50" required autocomplete="off">
									</div>
									<div class="row">
										<div class="col-4">
											<label for="exampleFormControlInput1" class="form-label">Telefone</label>
											<input type="tel" class="form-control" id="telefone" name="telefone"  maxlength="11" required autocomplete="off">
										</div>
										<div class="col-8">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Cargo</label>
												<input type="text" class="form-control" name='cargo' id="cargo" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											<label for="exampleFormControlInput1" class="form-label">CEP</label>
											<input type="text" class="form-control" id="cep" name='cep' maxlength="8" onkeyup="viaCEP()" autocomplete="off">
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
											<input type="int" class="form-control" name='numero' minlength="1" maxlength="3" id="exampleFormControlInput1" required autocomplete="off">
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
											<input type="text" class="form-control" name='bairro' id="bairro" required>
										</div>
										<div class="col-5">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Cidade</label>
												<input type="text" class="form-control" name='cidade' id="cidade" required>
											</div>
										</div>
										<div class="col-2">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Estado</label>
												<input type="text" class="form-control" name='uf' maxlength="2" id="uf" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-5">
											<label for="exampleFormControlInput1" class="form-label">Data</label>
											<input type="date" class="form-control" name='data' id="data" required autocomplete="off">
										</div>
										<div class="col-4">
											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Hora</label>
												<input type="time" class="form-control" name='hora' id="hora" required autocomplete="off">
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
				<?php include 'footer.php' ?>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>


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

            success: function (dados) {
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
    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('.money').mask('000.000.000.000.000,00', { reverse: true });
    $('.money2').mask("#.##0,00", { reverse: true });
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', { reverse: true });
    $('.clear-if-not-match').mask("00/00/0000", { clearIfNotMatch: true });
    $('.placeholder').mask("00/00/0000", { placeholder: "__/__/____" });
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", { selectOnFocus: true });
</script>


<script type="text/javascript">
    $("#cpfcnpj").keydown(function () {
        try {
            $("#cpfcnpj").unmask();
        } catch (e) { }

        var tamanho = $("#cpfcnpj").val().length;

        if (tamanho < 11) {
            $("#cpfcnpj").mask("999.999.999-99");
        } else {
            $("#cpfcnpj").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function () {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });
</script>