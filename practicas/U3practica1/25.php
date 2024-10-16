<?php

/* Crea una matriz para guardar a los amigos clasificados por diferentes ciudades. 

Los valores serán los siguientes:

En Madrid: nombre Pedro, edad 32, teléfono 91-999.99.99
En Barcelona: nombre Susana, edad 34, teléfono 93-000.00.00
En Toledo: nombre Sonia, edad 42, teléfono 925-09.09.09

Haz un recorrido del array multidimensional mostrando los valores de tal manera 
que nos muestre en cada ciudad que amigos tiene */

$amigos = [
    
    "Madrid" => [
        "nombre" => "Pedro",
        "edad" => "32",
        "teléfono" => "91-999.99.99"
        ],

    "Barcelona"=> [
        "nombre" => "Susana",
        "edad" => "34",
        "teléfono" => "93-000.00.00"
    ],

    "Toledo" => [
        "nombre" => "Sonia",
        "edad" => "42",
        "teléfono" => "925-09.09.09"
    ]
];

foreach ($amigos as $key => $value) {
    echo "</br>",$key, ": </br></br>";
    foreach ($value as $key2 => $value2) {
        echo $key2, ":", $value2, "</br>";
    }
}