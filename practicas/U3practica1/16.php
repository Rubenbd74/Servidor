<?php

/* Crea un array llamado “lenguajes_cliente” y otro “lenguajes_servidor”, crea tu 
mismo los valores, poniendo índices alfanuméricos a cada valor con tres 
elementos cada uno. Junta ambos arrays en uno solo llamado “lenguajes” y 
muéstralo por pantalla en una tabla. */

$lenguajes_cliente = [
    "es" => "Español",
    "in" => "Inglés",
    "fr" => "Frances",
];

$lenguajes_servidor = [
    "pt" => "Portugues",
    "ru" => "Ruso",
    "it" => "Italiano",
];

$lenguajes = array_merge($lenguajes_cliente, $lenguajes_servidor);
$lenguajes = implode(", ", ($lenguajes));

echo $lenguajes;