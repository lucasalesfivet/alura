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

$sql = "INSERT INTO opccompcand (id_agendcand, pretsalarial, dtnasc, localnasc, ufnasc, nomemae, nomepai, estadocivil, filhos, qtdfilhos, idadefilhos, tamcalcado, tamcamisa, protesepino, formacao, office, horarios, processoatual, beneficiario)
        VALUES ('$id', '$pretsalarial', '$dtnasc', '$localnasc', '$ufnasc', '$nomemae', '$nomepai', '$estadocivil', '$filhos', '$qtdfilhos', '$idadefilhos', '$tamcalcado', '$tamcamisa', '$protesepino', '$formacao', '$office', '$horarios', '$processoatual', '$beneficiario')";
            
echo $sql;
//$atualizar = mysqli_query($conexaoopc,$sql);

//header('Location: verificar_info.php?id='.$id);

?>
