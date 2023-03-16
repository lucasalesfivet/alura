<?php

include 'connect/conexao.php';

$id = $_POST['id'];
$curriculo = $_FILES['curriculo'];
$redacao = $_FILES['redacao'];


if (($curriculo !== null) && ($redacao !== null)) {
    preg_match("/\.(png|jpg|jpeg|pdf){1}$/i", $curriculo["name"], $cur);
    preg_match("/\.(png|jpg|jpeg|pdf){1}$/i", $redacao["name"], $red);

    if (($cur == true) && ($red == true)) {
        $nome_curriculo = md5(uniqid(time())) . "." . $cur[1];
        $caminho_curriculo = "curriculo/" . $nome_curriculo;
        move_uploaded_file($curriculo['tmp_name'], $caminho_curriculo);

        $nome_redacao = md5(uniqid(time())) . "." . $red[1];
        $caminho_redacao = "redacao/" . $nome_redacao;
        move_uploaded_file($redacao['tmp_name'], $caminho_redacao);

        $sql = "UPDATE opccompcand SET curriculo = '$nome_curriculo', redacao = '$nome_redacao' WHERE id_agendcand = $id";  
        
    } elseif (($cur == true) && ($red == false)) {
        $nome_curriculo = md5(uniqid(time())) . "." . $cur[1];
        $caminho_curriculo = "curriculo/" . $nome_curriculo;
        move_uploaded_file($curriculo['tmp_name'], $caminho_curriculo);

        $sql = "UPDATE opccompcand SET curriculo = '$nome_curriculo' WHERE id_agendcand = $id";

    } else {
        $nome_redacao = md5(uniqid(time())) . "." . $red[1];
        $caminho_redacao = "redacao/" . $nome_redacao;
        move_uploaded_file($redacao['tmp_name'], $caminho_redacao);

        $sql = "UPDATE opccompcand SET redacao = '$nome_redacao' WHERE id_agendcand = $id";
   }
}

//echo $sql;

$atualizar = mysqli_query($conexaoopc, $sql);

header('Location: verificar_info.php?id=' . $id);
