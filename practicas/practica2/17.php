<?php

/* Rellena los siguientes tres arrays y júntalos en uno nuevo. Muéstralos por 
pantalla. Utiliza la función array_merge()
"Lagartija", "Araña", "Perro", "Gato", "Ratón" 
"12", "34", "45", "52", "12"
"Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34" */

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

$union = array_merge($animales, $numero, $aleatorio);
echo implode(", ", $union);