<?php

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

