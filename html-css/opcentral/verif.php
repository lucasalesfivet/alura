<?php

set_time_limit(0);

function valida_ldap($srv, $usr, $pwd)
{

    $ldap_server = $srv;
    $auth_user = $usr;
    $auth_pass = $pwd;

    // Tenta se conectar com o servidor
    if (!($connect = @ldap_connect($ldap_server))){
       return FALSE;
    }

    // Tenta autenticar no servidor
    if (!($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
        // se nao validar retorna false
        return FALSE;
    } else {
        // se validar retorna true
        return TRUE;
    }

} // fim funcao conectar ldap

$dominio = "@opcao.com";
$usu = $_REQUEST['usu'].$dominio;
$senha = $_REQUEST['senha'];
$ip_server = "192.168.1.83";

if (valida_ldap($ip_server, $usu, $senha)) {

    session_start();
    $_SESSION['usu'] = $usu;

    header("Location: home.php");

} else {

    session_start();
    header("Location: index.php");
}

?>