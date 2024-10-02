<?php

/*Determinar la cantidad de dinero que recibirá un trabajador por concepto de las 
horas extras trabajadas en una empresa, sabiendo que cuando las horas de 
trabajo exceden de 40, el resto se consideran horas extras y que estas se pagan al 
doble de una hora normal cuando no exceden de 8; si las horas extras exceden de 
8 se pagan las primeras 8 al doble de lo que se pagan las horas normales y el resto 
al triple.*/

$horas = 60;

if ($horas > 40) {
    if ($horas > 48) {
        $horasNormales = 40;
        $horasExtras1 = 8;
        $horasExtras2 = $horas - 48;

        $horasTotales = $horasNormales + ($horasExtras1 * 2) +($horasExtras2 * 3);
        echo "La paga total es: ", $horasTotales;

    } else {
        $horasNormales = 40;
        $horasExtras = $horas - 40;

        $horasTotales = $horasNormales + ($horasExtras * 2);
        echo "La paga total es: ", $horasTotales;

    }

} else {
    $horasTotales = $horas;
    echo "La paga total es: ", $horasTotales;

}