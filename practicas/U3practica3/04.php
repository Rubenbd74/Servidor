<?php

/* Escribe una función que reciba un array de números, y un número, el límite. La 
función tiene que devolver un nuevo array que contenga solo los elementos del 
array original menores que el límite */

$array=array(1,2,3,4,5,6,7,8,9,10);
$limite = 9;

function arrayLimitado($array, $limite){
    for ($i=0; $i < count($array); $i++) { 
        if($array[$i] == $limite){
            echo "El array llegó al limite: ", $limite, " valor actual: ", $array[$i];
        }
        if($array[$i]<$limite){
            echo $array[$i], "<br>";
        }
    }
}
arrayLimitado($array, $limite);