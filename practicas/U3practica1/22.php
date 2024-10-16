<?php

/* Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el 
contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. A 
continuación borrar el contenido de posición 5. Vuelve a mostrar el contenido y 
por último elimina el array. */

$array = array(
    5 => 1,
    12 => 2, 
    13 => 56, 
    "x" => 42
);
print_r($array);
echo "</br> El array tiene ", count($array), " elementos</br>";
unset($array[5]);
print_r($array);
unset($array);