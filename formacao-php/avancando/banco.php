<?php

require_once 'funcoes.php';

$contasCorrentes = [
    '04130547130' => [
        'titular' => 'Maria', 
        'saldo' => 10000
    ],
    '04130547131' => [
        'titular' => 'Alberto',
        'saldo' => 300
    ], 
    '04130547132' => [
        'titular' => 'Vinicius',
        'saldo' => 100
    ]
];

$contasCorrentes['04130547130'] = sacar(
    $contasCorrentes['04130547130'], 
    $valorASacar = 500
);

$contasCorrentes['04130547131'] = sacar(
    $contasCorrentes['04130547131'], 
    $valorASacar = 500
);

$contasCorrentes['04130547132'] = depositar(
    $contasCorrentes['04130547132'],
    $valorADepositar = 900
);

/*
if (500 > $contasCorrentes['04130547130']['saldo']) {
    exibeMensagem("você não pode sacar");
} else {
    $contasCorrentes['04130547130']['saldo'] -= 500;
}

if (500 > $contasCorrentes['04130547131']['saldo']) {
    exibeMensagem("você não pode sacar");
} else {
    $contasCorrentes['04130547131']['saldo'] -= 500;
}
*/

foreach ($contasCorrentes as $cpf => $conta) {
    exibeMensagem(
        $cpf . ' ' . $conta['titular'] . ' ' . $conta['saldo']
    );
}

?>