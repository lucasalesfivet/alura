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

$contasCorrentes = [
    04130547130 => $conta1, 
    04130547131 => $conta2, 
    04130547132 => $conta3
];

$contasCorrentes[] = [
    'titular' => 'Claudia',
    'saldo' => 2000
];


foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . ' ' . $conta['titular'] . PHP_EOL;
}

?>