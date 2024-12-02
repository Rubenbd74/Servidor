<?php
session_start();

$colors = ['red', 'blue', 'green', 'yellow'];
$randomColors = $_SESSION['randomColors'];

echo "<h1>¡Has acertado!</h1>";
echo "<h2>Usuario: " . $_SESSION['usuario'] . "</h2>";
echo "<h2>Combinación acertada:</h2>";
for ($i = 0; $i < 4; $i++) {
    echo '<svg width="100" height="100">';
    echo '<circle id="circle' . ($i + 1) . '" cx="50" cy="50" r="40" fill="' . $colors[$randomColors[$i]] . '"></circle>';
    echo "</svg>";
}

$conexion = mysqli_connect("localhost", "root", "", "bdsimon");
$sql = "INSERT INTO jugada (usuario, color1, color2, color3, color4, acierto) VALUES ('" . $_SESSION['usuario'] . "', '" . implode("', '", $randomColors) . "', 1)";
$result = mysqli_query($conexion, $sql);