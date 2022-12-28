<?php

function sacar($conta, $valorASacar) {
    if ($valorASacar > $conta['saldo']) {
        exibeMensagem("Você não pode sacar!");
    } else {
        $conta['saldo'] -= $valorASacar;
    }

    return $conta;
}

function exibeMensagem($mensagem){
    echo $mensagem . PHP_EOL;
}

function depositar($conta, $valorADepositar) {
    if ($valorADepositar > 0) {
    $conta['saldo'] += $valorADepositar;
    } else {
        exibeMensagem("Você não pode depositar um valor negativo!");
    }
    return $conta;
}

?>