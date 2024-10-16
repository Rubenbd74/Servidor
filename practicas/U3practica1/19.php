<?php

/* Muestra el array del ejercicio anterior pero en orden inverso. */

$animales = [
    "Lagartija", 
    "Araña", 
    "Perro", 
    "Gato", 
    "Ratón"
];

$numero = [
    "12",
    "34",
    "45",
    "52",
    "12"
];

$aleatorio = [
    "Sauce",
    "Pino",
    "Naranjo",
    "Chopo",
    "Perro",
    "34"
];


$union = array();
array_push($union, $animales, $numero, $aleatorio);

foreach ($union as $key => $value) {
    foreach ($value as $key => $value) {
        echo " $value </br>";
    }
}
