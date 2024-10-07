<?php

/* Generar de forma aleatoria una matriz de 4*5 con valores numéricos, determinar 
fila y columna del elemento mayor. */

$matriz = array();
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz[$i][$j] = rand(0, 10);
    }
}   
echo "</br>";

$mayor = $matriz[0][0];
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        if ($matriz[$i][$j] > $mayor) {
            $mayor = $matriz[$i][$j];
            $fila = $i;
            $columna = $j;
        }
    }
}

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        echo " ( ", $matriz[$i][$j], " ) ";
    }
    echo "</br>";
}


echo "</br>";
echo "La fila del elemento mayor es ", $fila, "</br>";
echo "La columna del elemento mayor es ", $columna, "</br>";
echo "El elemento mayor es ", $mayor;
