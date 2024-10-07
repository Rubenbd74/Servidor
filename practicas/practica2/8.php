<?php

/* Hacer un algoritmo que llene una matriz de 10x10 con valores aleatorios y 
determine la posición [fila, columna] del número mayor almacenado en la matriz. */

$matriz = array();
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $matriz[$i][$j] = rand(-10, 50);
    }
}   
echo "</br>";

$mayor = $matriz[0][0];
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($matriz[$i][$j] > $mayor) {
            $mayor = $matriz[$i][$j];
            $fila = $i;
            $columna = $j;
        }
    }
}

for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        echo " ( ", $matriz[$i][$j], " ) ";
    }
    echo "</br>";
}

echo "</br>";
echo "La fila del elemento mayor es ", $fila, "</br>";
echo "La columna del elemento mayor es ", $columna, "</br>";
echo "El elemento mayor es ", $mayor;
