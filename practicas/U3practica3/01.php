<?php

/* Crea una función para resolver la ecuación de segundo grado. Esta función recibe 
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay 
soluciones reales, devuelve FALSE. */ // Formula: x=-b+-√(b²-4ac)/2a;

function EcuacionSegundoGrado($a, $b, $c) {
    // Calcular el discriminante
    $discriminante = pow($b,2) - 4 * $a * $c;

    // Si el discriminante es negativo, no hay soluciones reales
    if ($discriminante < 0) {
        return FALSE;
    }

    // Calcular las soluciones
    $solucion1 = (-$b + sqrt($discriminante)) / (2 * $a);
    $solucion2 = (-$b - sqrt($discriminante)) / (2 * $a);

    // Devolver las soluciones en un array
    return array($solucion1, $solucion2);
}

// Establecer los valores
$a = 1;
$b = -3;
$c = 2;
$soluciones = EcuacionSegundoGrado($a, $b, $c);

if ($soluciones !== FALSE) {
    echo "Las soluciones son: " . $soluciones[0] . " y " . $soluciones[1];
} else {
    echo "No hay soluciones reales";
}