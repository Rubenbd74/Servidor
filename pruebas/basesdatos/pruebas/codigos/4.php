<?php
session_start();

$colors = ['red', 'blue', 'yellow', 'green'];
$randomColors = $_SESSION['randomColors'];

mysqli_connect("localhost","root","", "bdsimon") or die('No se ha podido conectar');
mysqli_query($conexion,"SET CHARACTER SET utf8");

$usuario = $_SESSION['usuario'];

$sql = "INSERT INTO jugada (usuario, color1, color2, color3, color4, acierto) VALUES ('$usuario', '" . implode("', '", $randomColors) . "', 1)";
$result = mysqli_query($conexion, $sql);

echo "<h1>¡Has acertado!</h1>";
echo "<h2>Usuario: " . $usuario . "</h2>";
echo "<h2>Combinación acertada:</h2>";
for ($i = 0; $i < 4; $i++) {
    echo '<svg width="100" height="100">';
}//no está terminado