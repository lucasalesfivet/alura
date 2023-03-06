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

$sql = "INSERT INTO opccompcand (id_agendcand, pretsalarial, dtnasc, localnasc, ufnasc, nomemae, nomepai, estadocivil, filhos, qtdfilhos, idadefilhos)
        VALUES ('$id', '$pretsalarial', '$dtnasc', '$localnasc', '$ufnasc', '$nomemae', '$nomepai', '$estadocivil', '$filhos', '$qtdfilhos', '$idadefilhos')";
            
//echo $sql;
$atualizar = mysqli_query($conexaoopc,$sql);

header('Location: candidatos.php');

?>
