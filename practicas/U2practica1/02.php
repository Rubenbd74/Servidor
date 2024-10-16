<?php

/*Dados 3 números asignados dentro del código a mostrar el número mayor de los 
tres.*/ 

echo $num1 = 7, "<br>";
echo $num2 = 8, "<br>";
echo $num3 = 7, "<br>";

if ($num1 >= $num2 && $num1 >= $num3) {
    $mayor = $num1;
} elseif ($num2 >= $num1 && $num2 >= $num3) {
    $mayor = $num2;
} else {
    $mayor = $num3;
}

echo "El número mayor es: $mayor";

