<?php

/* Crea una función para resolver la ecuación de segundo grado. Esta función recibe 
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay 
soluciones reales, devuelve FALSE. */

function EcuacionSegundoGrado($a, $b, $c) {
    $discriminante = $b * $b - 4 * $a * $c;
    
    if ($discriminante < 0) {
        return false;
    } elseif ($discriminante == 0) {
        $solucion = -$b / (2 * $a);
        return array($solucion);
    } else {
        $solucion1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $solucion2 = (-$b - sqrt($discriminante)) / (2 * $a);
        return array($solucion1, $solucion2);
    }
}

$a = 1;
$b = 5;
$c = 6;

$soluciones = EcuacionSegundoGrado($a, $b, $c);

if ($soluciones !== false) {
    if (count($soluciones) == 1) {
        echo "La ecuación tiene una solución real: " . $soluciones[0];
    } else {
        echo "La ecuación tiene dos soluciones reales: " . $soluciones[0] . " y " . $soluciones[1];
    }
} else {
    echo "La ecuación no tiene soluciones reales.";
}