<?php

/* Genera una matriz de 4*4 de forma aleatoria con números enteros desordenados 
mostrar en un renglón los elementos almacenados en la diagonal principal y en el 
siguiente los de la diagonal secundaria. */

$matriz = array();
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $matriz[$i][$j] = rand(0, 10);
    }
}

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        echo " ( ", $matriz[$i][$j], " ) ";
    }
    echo "</br>";
}


