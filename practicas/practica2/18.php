<?php

/* Realiza el ejercicio anterior pero con la funicón array_push(). */

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
print_r($union);
