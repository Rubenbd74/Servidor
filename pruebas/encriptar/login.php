<?php // login.php
$hn = 'localhost';
$db = 'jeroglifico';
$un = 'root';  // 'jugador'
$pw = '';      // 'jugador'

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>