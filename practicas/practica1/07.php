<?php

/* Hacer un programa que calcule todos los números primos entre 1 y 50 y los 
muestre por pantalla. Un número primo es un número entero que sólo es 
divisible por 1 y por sí mismo. */


for ($i = 1; $i <= 50; $i++) {
    $div = 0;
    echo $i%50, "</br>";
    if ($i%50==0){
        $div += $div+1;
    }
    if ($div <= 2){
        echo $i, "</br>";
    }
}