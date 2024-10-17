<?php

/* Escribe un script para probar algunas de las funciones mostradas debajo, el sript 
ha de contener al menos tres funciones de cada bloque

Funciones de variables: 

isset($var), is_null($var), empty($var), 
is_int($var), is_float($var), is_bool($var), is_array($var), 
intval($var), floatval($var), boolval($var), strval($var)


Funciones de cadenas: 

strlen($cad), explode($cad, $token), implode($token, $array), strcmp($cad1, $cad2), 
strtolower($cad), strtoupper($cad), str($cad, $cad2)


Funciones de array:

ksort($arr), krsort($arr), 
sort($arr), rsort($arr),
array_values($arr), array_keys($arr),
array_key_exists($arr, $cla), count($arr)*/


//________________________________________________________


// Funciones de Variables
function probarVariables() {
    echo "Funciones de Variables: <br>";
    $var = 10;
    echo "isset(\$var): " , (isset($var) ? "TRUE" : "FALSE") , "</br>";
    echo "is_int(\$var): " , (is_int($var) ? "TRUE" : "FALSE") , "</br>";
    echo "intval(\$var): " , intval($var) , "</br>";
    $var = null;
    echo "is_null(\$var): " , (is_null($var) ? "TRUE" : "FALSE") , "</br>";
    $var = "";
    echo "empty(\$var): " , (empty($var) ? "TRUE" : "FALSE") , "</br></br>";
}

// Funciones de Cadenas
function probarCadenas() {
    echo "Funciones de Cadenas: <br>";
    $cad = "Hola mundo";
    echo "strlen(\$cad): " , strlen($cad) , "</br>";
    $array = explode(" ", $cad);
    echo "explode(\$cad, ' '): ";
    print_r($array);
    echo "</br>";
    echo "implode(' ', \$array): " , implode(" ", $array) , "</br>";
    echo "strcmp('hola', 'mundo'): " , strcmp("hola", "mundo") , "</br></br>";
}

// Funciones de Arrays
function probarArrays() {
    echo "Funciones de Arrays: <br>";
    $arr = array("clave1" => "valor1", "clave2" => "valor2");
    ksort($arr);
    echo "ksort(\$arr): ";
    print_r($arr);
    echo "</br>";
    $arr = array(2, 1, 3);
    sort($arr);
    echo "sort(\$arr): ";
    print_r($arr);
    echo "</br>";
    $arr = array("clave1" => "valor1", "clave2" => "valor2");
    echo "array_values(\$arr): ";
    print_r(array_values($arr));
    echo "</br>";
    echo "array_key_exists(\$arr, 'clave1'): " , (array_key_exists('clave1', $arr) ? "TRUE" : "FALSE") , "</br>";
}

probarVariables();
probarCadenas();
probarArrays();