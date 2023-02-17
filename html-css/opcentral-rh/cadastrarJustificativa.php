<?php

include 'connect/conexao.php';

$id = $_POST['id'];
$justificativa = $_POST['justificativa'];

$sql = "UPDATE opcagendcand SET justificativa = '$justificativa' WHERE id = $id";
            
//echo $sql;
$atualizar = mysqli_query($conexaoopc,$sql);

header('Location: verCancelado.php?id='.$id);

?>
