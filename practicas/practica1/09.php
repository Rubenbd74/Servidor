<?php

/* Escriba un programa a partir de un número entero generado de forma aleatoria 
indique si es primo. Un número primo es aquel que es divisible por el mismo y la 
unidad. */

echo "Número generado: ",$i = rand(1, 100), "</br>";
$div = 0;

//$i= 67; //2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97. son los numeros primos entre 1 y 100;

for ($a = 1; $a <= $i; $a++) {
    if ($i % $a == 0 && $a != $i) {
        $div += $a;
    }

    if ($div == 1 && $a == $i) {
        echo $i, " es un numero primo, tiene ", $div, " divisor </br>";
    }
}

if ($div != 1) {
    echo $i, " no es un numero primo, tiene ", $div, " divisores </br>";
}
