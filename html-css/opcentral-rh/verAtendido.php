<?php

session_start();

// se usuario nao registrado, redireciona p/ validacao

if (!isset($_SESSION['usu']))

    header("Location: index.php?op=err");
?>

<?php

include 'connect/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM opcagendcand A LEFT JOIN opccompcand B ON B.id_agendcand = A.id WHERE id = ('$id')";
$busca = mysqli_query($conexaoopc, $sql);
while ($dados = mysqli_fetch_array($busca)) {;
    $id = $dados['id'];
    $nome = $dados['nome'];
    $email = $dados['email'];
    $telefone = $dados['telefone'];
    $cargo = $dados['cargo'];
    $cep = $dados['cep'];
    $logradouro = $dados['logradouro'];
    $numero = $dados['numero'];
    $complemento = $dados['complemento'];
    $bairro = $dados['bairro'];
    $cidade = $dados['cidade'];
    $estado = $dados['estado'];
    $data = $dados['data'];
    $dtatendido = $dados['dtatendido'];
    $id_agendcand = $dados['id_agendcand'];
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

                        <h1 class="h3 mb-3">Candidato Atendido</h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Nome:</h5>
                                        <h6> <?php echo $nome ?></h6>
                                        <h5 class="card-title">Email:</h5>
                                        <h6> <?php echo $email ?></h6>
                                        <h5 class="card-title">Telefone:</h5>
                                        <h6> <?php echo $telefone ?></h6>
                                        <h5 class="card-title">Cargo:</h5>
                                        <h6> <?php echo $cargo ?></h6>
                                        <h5 class="card-title">Endereço:</h5>
                                        <h6> <?php echo $logradouro . ', ' . $numero . ' - ' . $bairro ?></h6>
                                        <h6><?php echo $cidade . ' ' . $estado . ' - ' . $cep ?></h6>
                                        <h5 class="card-title">Agendamento</h5>
                                        <h6> <?php echo $data ?></h6>
                                        <h5 class="card-title">Atendido</h5>
                                        <h6> <?php echo $dtatendido ?></h6>
                                    </div>
                                </div>
                                <a class="btn btn-danger" style="color:#fff" href="todosCandidatos.php" role="button">
                                    Voltar
                                </a>
                                <?php if ($id_agendcand > 0) { ?>
                                    <a class="btn btn-success" style="color:#fff" href="verificar_info.php?id=<?php echo $id ?>" role="button">
                                        Informações Complementares
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success" style="color:#fff" href="adicionar_info.php?id=<?php echo $id ?>" role="button">
                                        Adicionar Informações
                                    </a>
                                    <a class="btn btn-primary" style="color:#fff" href="corrigir.php?id=<?php echo $id ?>" role="button">
                                        Corrigir Atendimento
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </main>

            <?php } ?>

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