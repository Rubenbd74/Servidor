<?php

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

