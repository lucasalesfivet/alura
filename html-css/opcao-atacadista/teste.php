<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $user = "CONSULTA";
    $pass = "CONSULTA";
    $name = "WINT";
    $host = "192.168.2.197";

    $tns = " (DESCRIPTION =(ADDRESS_LIST =(ADDRESS = (PROTOCOL = TCP) (HOST = " . $host . ")(PORT = 1521)))(CONNECT_DATA = (SID = " . $name . ")))";

    $conexao = new PDO("oci:dbname=WINT;host=192.168.2.197", $user , $pass);

    if (isset ($conexao) || empty($conexao)){
        $erro = oci_error();
        trigger_error(htmlentities($erro['erro'], ENT_QUOTES), E_USER_ERROR);
    exit;
    }
    
    echo"ola";





    /* include 'connect/conexao.php';
    
    $conexao = new PDO($ora_user, $ora_senha, $ora_bd);
    $sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE)");

    $stid = oci_parse($conexao, $sql);
    $execute = oci_execute($stid);

    while  (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        // Use the uppercase column names for the associative array indices
        echo "Total de pedidos hoje: " . $row['NUMPED'];
    }*/
    ?>

</body>

</html>