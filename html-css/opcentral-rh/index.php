<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>OPCentral</title>
    <link rel="icon" href="img/logoarcos.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/menu.css">
    <script language="JavaScript" type="text/javascript" src="connect/funcs.js"></script>
</head>

<body>

    <div class="container" id="caixa">
        <img src="img/logoquadrada.png" class="img-logo">
        <form id="formulario" method="post" action="verif.php" name="form" AUTOCOMPLETE='ON' onSubmit="return valida()">
            <div class="form-group">
                <!-- <label id="formulario-texto">Usuário:</label> -->
                <input type="text" name="usu" class="form-control" placeholder="Informe seu usuário" autocomplete="off" required>
            </div>
            <div class="form-group">
                <!-- <label id="formulario-texto">Senha:</label> -->
                <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" autocomplete="off" required>
            </div>
            <div class="botao">
                <button type="submit" class="btn btn-success btn-block">Entrar</button>
            </div>
        </form>
        <div class="rodape">
            <h3>OPCentral | Tecnologia & Inovação - 2023</h3>
        </div>
    </div>


    <!--
    <section class="principal">
        <div class="quadro">
            <img src="img/logoquadrada.png" class="img-logo">
            <div class="botao-entrar">
                <a href="home.html" class="botao-entrar">ENTRAR</a>
            </div>
            <h1 class="base">OPCentral | Tecnologia & Inovação - 2022</h1>
        </div>
    </section>
-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>