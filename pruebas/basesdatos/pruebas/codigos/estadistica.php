<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "bdsimon");
$sql = "SELECT * FROM jugada";
$result = mysqli_query($conexion, $sql);

echo "<h1>Estadísticas</h1>";
echo "<table border='1'>";
echo "<tr><th>Usuario</th><th>Aciertos</th><th>Fallos</th></tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row['usuario'] . "</td><td>" . $row['acierto'] . "</td><td>" . (4 - $row['acierto']) . "</td></tr>";
}
echo "</table>";

echo "<h2>Gráfica de aciertos</h2>";
echo "<svg width='400' height='200'>";
echo "<rect x='50' y='50' width='300' height='100' fill='#CCCCCC' rx='10' ry='10'/>";
echo "<rect x='50' y='50' width='" . (300 * $row['acierto'] / 4) . "' height='100' fill='#00FF00' rx='10' ry='10'/>";
echo "</svg>";