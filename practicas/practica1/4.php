<?php

/* Identificar entre dos números aleatorios cual es el mayor y si este es par o impar.
Buscar información previamente para generar números aleatorios y usarla para 
resolver el ejercicio.*/

echo $num1 = rand(1, 100),"<br>";
echo $num2 = rand(1, 100),"<br>";

if ($num1 > $num2) {
    $mayor = $num1;
    
} else {
    $mayor = $num2;
}

if ($mayor % 2 == 0) {
    echo "El número mayor es $mayor, que es un número par";

} else {
    echo "El número mayor es $mayor, que es un número impar";
}

