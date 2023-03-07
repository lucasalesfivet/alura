<?php

include 'connect/conexao.php';

$id = $_GET['id'];
//echo $id;

?>

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
    <title>OPCentral</title>

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

                    <h1 class="h3 mb-3">Adicionar Informações</h1>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="cadastrarInformacoes.php" enctype='multipart/form-data' method='post'>
                                    <?php
                                    $sql = "SELECT * FROM opcagendcand WHERE id = $id";
                                    $busca = mysqli_query($conexaoopc, $sql);
                                    while ($dados = mysqli_fetch_array($busca)) {

                                        $nome = $dados['nome'];
                                        $cargo = $dados['cargo'];

                                    ?>
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="exampleFormControlInput1" class="form-label">Candidato</label>
                                                <input type="text" class="form-control" id="nome" value="<?php echo $nome ?>" name='nome' maxlength="50" disabled>
                                                <input type="hidden" class="form-control" id="id" value="<?php echo $id ?>" name='id'>
                                            </div>
                                            <div class="col-4">
                                                <label for="exampleFormControlInput1" class="form-label">Cargo Pretendido</label>
                                                <input type="text" class="form-control" id="cargo" value="<?php echo $cargo ?>" name='cargo' maxlength="50" disabled>
                                                <input type="hidden" class="form-control" id="id" value="<?php echo $id ?>" name='id'>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleFormControlInput1" class="form-label">Pretensão Salarial</label>
                                                <input type="text" class="form-control" id="pretsalarial" name='pretsalarial' maxlength="50" autocomplete="off">
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleFormControlInput1" class="form-label">Estado Civil</label>
                                                <input type="text" class="form-control" id="estadocivil" name='estadocivil' maxlength="50" autocomplete="off">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="exampleFormControlInput1" class="form-label">Data de Nascimento</label>
                                                <input type="date" class="form-control" name='dtnasc' id="dtnasc">
                                            </div>
                                            <div class="col-5">
                                                <label for="exampleFormControlInput1" class="form-label">Local de Nascimento</label>
                                                <input type="text" class="form-control" name='localnasc' id="localnasc">
                                            </div>
                                            <div class="col-2">
                                                <label for="exampleFormControlSelect1" class="form-label">UF</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name='uf' required>
                                                    <option></option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AM</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SP">SP</option>
                                                    <option value="SE">SE</option>
                                                    <option value="TO">TO</option>
                                                </select>

                                            </div>
                                        </div><br>
                                        <div class="md-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nome da Mãe</label>
                                            <input type="text" class="form-control" id="nomemae" name='nomemae' maxlength="50" autocomplete="off">
                                        </div><br>
                                        <div class="md-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nome do Pai</label>
                                            <input type="text" class="form-control" id="nomepai" name='nomepai' maxlength="50" autocomplete="off">
                                        </div><br>
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="exampleFormControlInput1" class="form-label">Filhos?</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="filhos" id="filhos" value="S">
                                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="filhos" id="filhos" value="N">
                                                    <label class="form-check-label" for="inlineRadio2">Não</label>
                                                </div>

                                            </div>
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Quantidade</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name='qtdfilhos'>
                                                        <option></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Idade dos Filhos</label>
                                                    <input type="text" class="form-control" name='idadefilhos' id="idadefilhos" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <label for="exampleFormControlInput1" class="form-label">Prótese ou Pino?</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="protesepino" id="protesepino" value="Sim">
                                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="protesepino" id="protesepino" value="Não">
                                                    <label class="form-check-label" for="inlineRadio2">Não</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Tamanho do calçado</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name='tamcalcado'>
                                                        <option></option>
                                                        <option value="36">36</option>
                                                        <option value="38">38</option>
                                                        <option value="40">40</option>
                                                        <option value="42">42</option>
                                                        <option value="44">44</option>
                                                        <option value="46">46</option>
                                                        <option value="48">48</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Tamanho da camisa</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name='tamcamisa'>
                                                        <option></option>
                                                        <option value="P">P</option>
                                                        <option value="M">M</option>
                                                        <option value="G">G</option>
                                                        <option value="GG">GG</option>
                                                        <option value="EGG">EGG</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Formação:</label>
                                                    <input type="text" class="form-control" id="formacao" name='formacao' maxlength="50" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Nível do pacote Office:</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name='office'>
                                                        <option></option>
                                                        <option value="Básico">Básico</option>
                                                        <option value="Intermediario">Intermediário</option>
                                                        <option value="Avançado">Avançado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Disponibilidade de horários:</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name='horarios'>
                                                        <option></option>
                                                        <option value="Diurno">Diurno</option>
                                                        <option value="Noturno">Noturno</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Está participando de algum processo seletivo no momento?</label>
                                                    <input type="text" class="form-control" id="processoatual" name='processoatual' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Está recebendo algum benefício do Governo atualmente?</label>
                                                    <input type="text" class="form-control" id="beneficiario" name='beneficiario' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Já moveu alguma ação trabalhista?</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="actrabalhista" id="actrabalhista" value="S">
                                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="actrabalhista" id="actrabalhista" value="N">
                                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Qual?</label>
                                                    <input type="text" class="form-control" id="descactrabalhista" name='descactrabalhista' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Faz uso de alguma medicação?</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="medicacao" id="medicacao" value="S">
                                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="medicacao" id="medicacao" value="N">
                                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Qual?</label>
                                                    <input type="text" class="form-control" id="descmedicacao" name='descmedicacao' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">Possui algum tipo de alergia?</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="alergia" id="alergia" value="S">
                                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="alergia" id="alergia" value="N">
                                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Qual?</label>
                                                    <input type="text" class="form-control" id="descalergia" name='descalergia' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlSelect1" class="form-label">É ou já foi fumante?</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fumante" id="fumante" value="S">
                                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fumante" id="fumante" value="N">
                                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Quando parou?</label>
                                                    <input type="text" class="form-control" id="desfumante" name='descfumante' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Qual seu perfil nas Redes Sociais? (Instagram e Facebook)</label>
                                                    <input type="text" class="form-control" id="processoatual" name='redesocial' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div><br>
                                        <h5 class="card-title">► Empregos anteriores</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Empresa</label>
                                                    <input type="text" class="form-control" id="empresaant1" name='empresaant1' maxlength="25" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                    <input type="text" class="form-control" id="cargoant1" name='cargoant1' maxlength="25" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="exampleFormControlInput1" class="form-label">Data de Admissão</label>
                                                <input type="date" class="form-control" name='admissao1' id="admissao1">
                                            </div>
                                            <div class="col-5">
                                                <label for="exampleFormControlInput1" class="form-label">Data de Desligamento</label>
                                                <input type="date" class="form-control" name='desligamento1' id="desligamento1">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Motivo</label>
                                                    <input type="text" class="form-control" id="motivo1" name='motivo1' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Empresa</label>
                                                    <input type="text" class="form-control" id="empresaant2" name='empresaant2' maxlength="25" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                    <input type="text" class="form-control" id="cargoant2" name='cargoant2' maxlength="25" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="exampleFormControlInput1" class="form-label">Data de Admissão</label>
                                                <input type="date" class="form-control" name='admissao2' id="admissao2">
                                            </div>
                                            <div class="col-5">
                                                <label for="exampleFormControlInput1" class="form-label">Data de Desligamento</label>
                                                <input type="date" class="form-control" name='desligamento2' id="desligamento2">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Motivo</label>
                                                    <input type="text" class="form-control" id="motivo2" name='motivo2' maxlength="30" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>



                                        <div style="text-align: right;">
                                            <a class="btn btn-primary" title="voltar" style="color:#fff" href="verAtendido.php?id=<?php echo $id ?>" role="button">
                                                Voltar
                                            </a>
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </div>
                                </form>
                            <?php } ?>
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


</body>

</html>