<?php

/* Calcular si un número entero generado de forma aleatoria entre 1 y 1000 es
perfecto. Un número perfecto es aquel que la suma de sus divisores es él mismo,
por ejemplo el 6, sus divisores son 1,2,3 la suma de los mismos es 6. */

echo "Número generado: ",$i = rand(1, 1000), "</br>";
$div = 0;

//$i= 6; //6 28 496 son losnumeros perfectos entre 1 y 1000;

for ($a = 1; $a <= $i; $a++) {
    if ($i % $a == 0 && $a != $i) {
        $div += $a;
    }

    if ($div == $i && $a == $i) {
        echo $i, " es un numero perfecto, la suma de sus divisores es: ", $div, "</br>";
    }
}

if ($div != $i) {
    echo $i, " no es un numero perfecto, la suma de sus divisores es: ", $div, "</br>";
}
