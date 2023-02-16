<?php

include 'connect/conexao.php';

$nome = $_POST['nome'];
$mail = $_POST['mail'];
$telefone = $_POST['telefone'];
$cargo = $_POST['cargo'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$data = $_POST['data'];
$hora = $_POST['hora'];


$sql = "INSERT INTO `opcagendcand`(`nome`, `email`, `telefone`, `cargo`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `data`, `hora`) 
            VALUES ('$nome','$mail','$telefone','$cargo','$cep','$logradouro','$numero','$complemento','$bairro','$cidade','$uf','$data', '$hora')";
//echo $sql;
$inserir = mysqli_query($conexaoopc,$sql);

header('Location: candidatos.php');
