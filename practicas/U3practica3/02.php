<?php

/* Almacena la función anterior en el fichero matemáticas.php. Crea un fichero que
la incluya y la utilice. */

include "matematicas.php";

// Utilizar la función EcuacionSegundoGrado
$a = 1;
$b = -3;
$c = 2;

$soluciones = EcuacionSegundoGrado($a, $b, $c);

if ($soluciones !== FALSE) {
    echo "Las soluciones son: </br> +b: ", $soluciones[0], "</br> -b: ", $soluciones[1];
} else {
    echo "No hay soluciones reales";
}