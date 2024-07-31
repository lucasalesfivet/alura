<?php 
$ora_user = "SYSTEM";
$ora_senha = "MANOPCAOSYS02";

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


if ($conexao = oci_connect($ora_user, $ora_senha, $ora_bd)){
    echo "Conectado!";
} else {
    echo "Não conectado!";
}
?>