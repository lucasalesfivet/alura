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

    $tns = " 
        (DESCRIPTION =
            (ADDRESS_LIST =
            (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.2.197)(PORT = 1521))
            )
            (CONNECT_DATA =
            (SERVICE_NAME = wint)
            )
        )
       ";
    $db_username = "CONSULTA";
    $db_password = "CONSULTA";
    try {
        $conexao = new PDO("oci:dbname=" . $tns, $db_username, $db_password);
    } catch (PDOException $e) {
        echo ($e->getMessage());
    }

    $sql = ("SELECT count(*) NUMPED FROM pcpedc where data = trunc(SYSDATE)");

    $resultado = $conexao->prepare($sql);
    $resultado->execute();

    while ($res = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo $res['NUMPED'];
    }


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