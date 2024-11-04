<?php

$valor = " Es tu nombre O\'reilly? ";
echo test_entrada($valor);

function test_entrada($valor) {
    $valor = trim($valor);
    $valor = stripslashes($valor);
    return $valor;
}   

/*Ésta función devuelve $valor = "Es tu nombre O'reilly?" */