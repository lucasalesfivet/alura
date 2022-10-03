<?php
    $idade = 17;
    $totalPessoas = 2;

    echo "Você só pode entrar se tiver a partir de 18 anos." . PHP_EOL;

    if ( $idade >=18) {
        echo "Você tem $idade anos." . PHP_EOL;
        echo "Pode entrar!";
    } else {
        if ($idade >= 16 && $totalPessoas > 1 ) { 
            echo "Você só tem $idade anos. Está acompanhado(a), pode entra.";
        } else {
            echo "Você não pode entrar.";
        }    
    }
?>