<?php

/* Generar una matriz de 3x4 y generar un vector que contenga los valores máximos 
de cada fila y otro que contenga los promedios de los mismos. Imprimir ambos 
vectores a razón de uno por renglón. */


// Generar la matriz
$matriz = array();
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $matriz[$i][$j] = rand(0, 10);
    }
}

// Imprimir la matriz
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        echo " ( ", $matriz[$i][$j], " ) ";
    }
    echo "</br>";
}
echo "</br>";

// Vector máximos 
$maximos = array();
for ($i = 0; $i < 3; $i++) {
    $maximos[$i] = max($matriz[$i]);
}

// Imprimir el vector
echo "Vector de máximos:</br>";
foreach ($maximos as $valor) {
    echo "(", $valor, ")</br>";
}
echo "</br>";

// Vector promedios
$promedios = array();
for ($i = 0; $i < 3; $i++) {
    $suma = array_sum($matriz[$i]);
    $promedios[$i] = $suma / count($matriz[$i]);
}

// Imprimir el vector
echo "Vector de promedios:</br>";
foreach ($promedios as $valor) {
    echo "(", $valor, ")</br>";
}