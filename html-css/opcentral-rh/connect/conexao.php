<?php 
$ora_user = "CONSULTA";
$ora_senha = "CONSULTA";

$ora_bd = 

    "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP) 
              (HOST=192.168.2.197)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=wint))
     )"; 

$conexao = oci_connect($ora_user, $ora_senha, $ora_bd);
/*
if ($ora_conexao = oci_connect($ora_user, $ora_senha, $ora_bd)){
    echo "Conectado!";
} else {
    echo "Não conectado!";
}*/
?>

<?php


$server = 'localhost';
$usuario = 'root';
$senha = '';
$base = 'opcentral';

$conexaoopc = mysqli_connect($server,$usuario,$senha,$base);


?>