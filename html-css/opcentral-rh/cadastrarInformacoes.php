<?php

include 'connect/conexao.php';

$id = $_POST['id'];
$pretsalarial = $_POST['pretsalarial'];
$dtnasc = $_POST['dtnasc'];
$localnasc = $_POST['localnasc'];
$ufnasc = $_POST['uf'];
$nomemae = $_POST['nomemae'];
$nomepai = $_POST['nomepai'];
$estadocivil = $_POST['estadocivil'];
$filhos = $_POST['filhos'];
$qtdfilhos = $_POST['qtdfilhos'];
$idadefilhos = $_POST['idadefilhos'];
$tamcalcado = $_POST['tamcalcado'];
$tamcamisa = $_POST['tamcamisa'];
$protesepino = $_POST['protesepino'];
$formacao = $_POST['formacao'];
$office = $_POST['office'];
$horarios = $_POST['horarios'];
$processoatual = $_POST['processoatual'];
$beneficiario = $_POST['beneficiario'];
$actrabalhista = $_POST['actrabalhista'];
$descactrabalhista = $_POST['descactrabalhista'];
$medicacao = $_POST['medicacao'];
$descmedicacao = $_POST['descmedicacao'];
$alergia = $_POST['alergia'];
$descalergia = $_POST['descalergia'];
$fumante = $_POST['fumante'];
$descfumante = $_POST['descfumante'];
$redesocial = $_POST['redesocial'];
$empresaant1 = $_POST['empresaant1'];
$cargoant1 = $_POST['cargoant1'];
$admissao1 = $_POST['admissao1'];
$desligamento1 = $_POST['desligamento1'];
$motivo1 = $_POST['motivo1'];
$empresaant2 = $_POST['empresaant2'];
$cargoant2 = $_POST['cargoant2'];
$admissao2 = $_POST['admissao2'];
$desligamento2 = $_POST['desligamento2'];
$motivo2 = $_POST['motivo2'];

$sql = "INSERT INTO opccompcand (id_agendcand, pretsalarial, dtnasc, localnasc, ufnasc, nomemae, nomepai, estadocivil, filhos, qtdfilhos, idadefilhos, tamcalcado, tamcamisa, protesepino, formacao, office, horarios, processoatual, beneficiario, actrabalhista, descactrabalhista, medicacao, descmedicacao, alergia, descalergia, fumante, descfumante, redesocial, empresaant1, cargoant1, admissao1, desligamento1, motivo1, empresaant2, cargoant2, admissao2, desligamento2, motivo2)
        VALUES ('$id', '$pretsalarial', '$dtnasc', '$localnasc', '$ufnasc', '$nomemae', '$nomepai', '$estadocivil', '$filhos', '$qtdfilhos', '$idadefilhos', '$tamcalcado', '$tamcamisa', '$protesepino', '$formacao', '$office', '$horarios', '$processoatual', '$beneficiario', '$actrabalhista', '$descactrabalhista', '$medicacao', '$descmedicacao', '$alergia', '$descalergia', '$fumante', '$descfumante', '$redesocial', '$empresaant1', '$cargoant1', '$admissao1', '$desligamento1', '$motivo1', '$empresaant2', '$cargoant2', '$admissao2', '$desligamento2', '$motivo2')";
            
echo $sql;
//$atualizar = mysqli_query($conexaoopc,$sql);

//header('Location: verificar_info.php?id='.$id);

?>
