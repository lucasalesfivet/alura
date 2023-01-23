<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'header.php';
    ?>
    <style>

.img-cover{
  object-fit: cover;
  object-position: center;
}


    </style>
</head>
<body>
    <div class="wrapper">
        <?php include 'menu.php'; ?>

        <div class="main">
            <?php 
                include 'topo.php'; 
            ?>


            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Cliente</h1>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Formulário do Cliente</h5>
                            </div>
                            <div class="card-body">
                                <form action="cadastroCliente.php" enctype='multipart/form-data' method='post'>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name='nome' required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                                        <input type="mail" class="form-control" id="exampleFormControlInput1"
                                            name='mail' required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone" required
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">CPF/CNPJ</label>
                                        <input type="text" class="form-control" id="cpfcnpj" name='cpfcnpj' required
                                            autocomplete="off">
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <label for="exampleFormControlInput1" class="form-label">CEP</label>
                                            <input type="text" class="form-control" id="cep" name='cep' maxlength="8"
                                                onkeyup="viaCEP()" required autocomplete="off">
                                        </div>
                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">Logradouro</label>
                                                <input type="text" class="form-control" name='logradouro'
                                                    id="logradouro" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="exampleFormControlInput1" class="form-label">Nº</label>
                                            <input type="text" class="form-control" name='numero'
                                                id="exampleFormControlInput1" required autocomplete="off">
                                        </div>
                                        <div class="col-10">
                                            <label for="exampleFormControlInput1" class="form-label">Complemento</label>
                                            <input type="text" class="form-control" name='complemento'
                                                id="exampleFormControlInput1" required autocomplete="off">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="exampleFormControlInput1" class="form-label">Bairro</label>
                                            <input type="text" class="form-control" name='bairro' id="bairro" required
                                                autocomplete="off">
                                        </div>
                                        <div class="col-5">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" name='cidade' id="cidade"
                                                    required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Estado</label>
                                                <input type="text" class="form-control" name='uf' id="uf" required
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Logo/Imagem Pessoa</label>
                                        <input class="form-control" type="file" name='foto' id="formFile">
                                    </div>
                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                    <form>
                            </div>
                        </div>
                    </div>


                </div>
            </main>
            <main class="content">
                <h4 class="h3 mb-3">Lista de Clientes</h4>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Dados dos Clientes</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">E-Mail</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'conexao.php';
                                        $sql = "SELECT * FROM cliente";
                                        $busca = mysqli_query($conexao,$sql);

                                        while($dados = mysqli_fetch_array($busca)) {
                                            $foto = $dados['imagem'];
                                            $nome = $dados['nome'];
                                            $mail = $dados['email'];
                                            $telefone = $dados['telefone'];
                                            $estado = $dados['estado'];

                                       ?>
                                    <tr>
                                       
                                        <td><image src="imagens/<?php echo $foto ?>" class="rounded-circle img-cover" width='50px' height='50px'></td>
                                        <td><?php echo $nome ?></td>
                                        <td><?php echo $mail ?></td>
                                        <td><?php echo $telefone ?></td>
                                        <td><?php echo $estado ?></td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
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