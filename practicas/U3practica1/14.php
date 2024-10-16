<?php

/* Repite el ejercicio anterior pero ahora si se han de crear índices asociativos, 
ejemplo:
El índice del array que contiene como valor Madrid es MD */

$ciudades = [
    "MD"=> "Madrid",
    "BC" => "Barcelona",
    "LD" => "Londres",
    "NY" => "New York",
    "LA" => "Los Angeles",
    "CH" => "Chicago",
];

foreach ($ciudades as $key => $value) {
    echo "El índice del array que contiene como valor ", $value, " es ", $key, "</br>";
}