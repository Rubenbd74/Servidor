<?php

/* Llenar una matriz de 20x20 con valores aleatorios. Sumar las columnas e 
imprimir la columna que tuvo la máxima suma y la suma de esa columna. */

$matriz = array();
for ($i = 0; $i < 20; $i++) {
    for ($j = 0; $j < 20; $j++) {
        $matriz[$i][$j] = rand(0, 1);
    }
}   
echo "</br>";

for ($i = 0; $i < 20; $i++) {
    for ($j = 0; $j < 20; $j++) {
        echo " ( ", $matriz[$i][$j], " ) ";
    }
    echo "</br>";
}

$max = 0;
for ($j = 0; $j < 20; $j++) {
    $suma = 0;
    for ($i = 0; $i < 20; $i++) {
        $suma += $matriz[$i][$j];
        if ($suma > $max) {
            $max = $suma;
            $columna = $j;
        }   
    }
}

echo "</br>";
echo "La columna que tiene la suma maxima es: ", $columna ,"</br>";
echo "La suma de esa columna es: ", $max;