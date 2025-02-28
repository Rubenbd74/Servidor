<?php
session_start();

$hn = 'localhost';
$db = 'pictogramas';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}