<?php

include 'connect/conexao.php';

$id = $_POST['id'];
$obsreagendamento = $_POST['obsreagendamento'];
$data = $_POST['data'];
$hora = $_POST['hora'];

$sql = "UPDATE opcagendcand SET dtcancelado = null, data = '$data', hora = '$hora', obsreagendamento = '$obsreagendamento' WHERE id = $id";
            
//echo $sql;
$atualizar = mysqli_query($conexaoopc,$sql);

header('Location: candidatos.php');

?>
