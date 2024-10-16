<?php

/* Almacena la función anterior en el fichero matemáticas.php. Crea un fichero que
la incluya y la utilice. */

include "matematicas.php";

// Programa principal
echo "Resolviendo la ecuación de segundo grado... </br>";
echo "Ingrese el coeficiente a: ";
$a = (int) fgets(STDIN);
echo "Ingrese el coeficiente b: ";
$b = (int) fgets(STDIN);
echo "Ingrese el coeficiente c: ";
$c = (int) fgets(STDIN);

$soluciones = resolverEcuacionSegundoGrado($a, $b, $c);

if ($soluciones !== false) {
    if (count($soluciones) == 1) {
        if ($soluciones[0] == "Infinitas soluciones") {
            echo "La ecuación tiene infinitas soluciones. </br>";
        } else {
            echo "La ecuación tiene una solución real: " . $soluciones[0] . "</br>";
        }
    } else {
        echo "La ecuación tiene dos soluciones reales: " . $soluciones[0] . " y " . $soluciones[1] . "</br>";
    }
} else {
    echo "La ecuación no tiene soluciones reales.</br>";
}