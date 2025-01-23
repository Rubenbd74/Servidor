<?php

require_once 'vendor/autoload.php';

use MongoDB\Client;

// Conectar a la base de datos MongoDB
$client = new Client("mongodb://localhost:27017");

// Seleccionar la base de datos empresa
$db = $client->empresa;

// Crear la colección empleados
$collection = $db->empleados;

// Insertar datos en la colección empleados
$empleados = [
  [
    "CodEmpleado" => 1,
    "nombre" => "Ana",
    "apellido1" => "Fuentes",
    "apellido2" => "Teruel",
    "departamento" => "3"
  ],
  [
    "CodEmpleado" => 2,
    "nombre" => "Luis",
    "apellido1" => "Marea",
    "apellido2" => "Motos",
    "departamento" => "3"
  ],
  [
    "CodEmpleado" => 3,
    "nombre" => "Antonio",
    "apellido1" => "Hoz",
    "apellido2" => "Perales",
    "departamento" => "4"
  ],
  [
    "CodEmpleado" => 4,
    "nombre" => "Eloisa",
    "apellido1" => "Puertas",
    "apellido2" => "Torres",
    "departamento" => "4"
  ]
];

// Insertar los datos en la colección empleados
$collection->insertMany($empleados);

echo "Migración realizada con éxito\n";