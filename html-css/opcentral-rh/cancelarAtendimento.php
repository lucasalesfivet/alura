<?php

include 'connect/conexao.php';

$id = $_GET['id'];

$sql = "UPDATE opcagendcand SET dtconfirmado = null, dtcancelado = CURRENT_TIMESTAMP WHERE id = ('$id')";
//echo $sql;
$inserir = mysqli_query($conexaoopc,$sql);

header('Location: home.php');

?>