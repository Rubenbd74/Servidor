<?php

/* Almacena en un array los 10 primeros números pares. Imprímelos cada uno en 
una línea. */

$par = array();
for ($i = 1; $i <= 10; $i++) {
    $par[$i] = $i * 2;
    echo $i, ".  ", $par[$i], "</br>";
}