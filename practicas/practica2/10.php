<?php

/* Carga el siguiente vector e imprime los valores del array asociativo usando la 
estructura de control foreach:
$v[1]=90;
$v[30]=7;
$v[‘e’]=99;
$v[‘hola’]=43; */

$vector= [
    1=> 90,
    30=> 7,
    "e"=> 99,
    "hola"=> 43,
];


 foreach ($vector as $key => $value) {
     echo " $key : $value </br>";
 }

 var_dump($vector);