<?php

include 'connect/conexao.php';

$id = $_GET['id'];

$sql = "UPDATE opcagendcand SET dtcancelado = CURRENT_TIMESTAMP WHERE id = ('$id')";
//echo $sql;
$inserir = mysqli_query($conexaoopc,$sql);

header('Location: candidatos.php');

?>