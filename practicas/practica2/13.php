<?php

/* Crea un array introduciendo las ciudades: Madrid, Barcelona, Londres, New York, 
Los Ángeles y Chicago, sin asignar índices al array. A continuación, muestra el 
contenido del array haciendo un recorrido diciendo el valor correspondiente a 
cada índice, ejemplo:
La ciudad con el índice 1 tiene el nombre de Barcelona.*/

$ciudades = [
    "Madrid",
    "Barcelona",
    "Londres",
    "New York",
    "Los Angeles",
    "Chicago"
];

foreach ($ciudades as $key => $value) {
    echo "La ciudad con el índice ", $key, " tiene el nombre de ", $value, "</br>";
}