<?php

$conta1 = [
    'titular' => 'Vinicius',
    'saldo' => 1000
];

$conta2 = [
    'titular' => 'Maria',
    'saldo' => 10000
];

$conta3 = [
    'titular' => 'Alberto',
    'saldo' => 300
];

$contasCorrentes = [$conta1, $conta2, $conta3];

for($indice=0; $indice<count($contasCorrentes) ;$indice++){
    echo $contasCorrentes[$indice]['titular'].PHP_EOL;
}

?>