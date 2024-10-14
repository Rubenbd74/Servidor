<?php

/* Implementa un array asociativo con los siguientes valores y ordénalo de menor a 
mayor. Muestra los valores en una tabla.
$numeros=array(3,2,8,123,5,1) */

$numeros = array(3,2,8,123,5,1);
asort($numeros); //ordena de menor a mayor el array mateniendo el índice
print_r($numeros);