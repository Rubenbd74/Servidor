<?php

/* Crea el código que dé respuesta al siguiente planteamiento:
Queremos almacenar en una matriz el número de alumnos con el que cuenta una 
academia, ordenados en función del nivel y del idioma que se estudia. Tendremos 
3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4 
columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3 
= Ruso). Mostrar por pantalla los alumnos que existen en cada nivel e idioma. */

$academia = array (
    $basico = array (1, 14, 8, 3,),
    $medio  = array (6, 19, 7, 2),
    $perfec = array (3, 13, 4, 1)
);

$idiomas = array("Inglés", "Francés", "Alemán", "Ruso");

echo "Nivel básico: </br>";
foreach ($basico as $key => $value) {
    echo $idiomas[$key], ": ", $value, "</br>";
}

echo "</br> Nivel medio: </br>";
foreach ($medio as $key => $value) {
    echo $idiomas[$key], ": ", $value, "</br>";
}

echo "</br> Nivel de perfeccionamiento: </br>";
foreach ($perfec as $key => $value) {
    echo $idiomas[$key], ": ", $value, "</br>";
}


