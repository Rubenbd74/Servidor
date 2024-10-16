<?php

/* Crea una función para resolver la ecuación de segundo grado. Esta función recibe 
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay 
soluciones reales, devuelve FALSE. */

function resolverEcuacionSegundoGrado($a, $b, $c) {
    if ($a == 0) {
        if ($b == 0) {
            if ($c == 0) {
                return array("Infinitas soluciones");
            } else {
                return false;
            }
        } else {
            $solucion = -$c / $b;
            return array($solucion);
        }
    } else {
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
}

// Programa principal
echo "Resolviendo la ecuación de segundo grado...\n";
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
            echo "La ecuación tiene infinitas soluciones.\n";
        } else {
            echo "La ecuación tiene una solución real: " . $soluciones[0] . "\n";
        }
    } else {
        echo "La ecuación tiene dos soluciones reales: " . $soluciones[0] . " y " . $soluciones[1] . "\n";
    }
} else {
    echo "La ecuación no tiene soluciones reales.\n";
}