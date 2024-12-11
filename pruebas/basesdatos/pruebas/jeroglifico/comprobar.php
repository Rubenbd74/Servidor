<?
require_once 'conexion.php';
session_start();
if(isset($_POST['comprobar'])) {
    $pareja1 = $_POST['pareja1'] - 1; // Restamos 1 para que coincida con el índice del array
    $pareja2 = $_POST['pareja2'] - 1;
    $intentos = $_SESSION['cartas_levantadas'];
    $login = $_SESSION["login"];
    
    if ($combinacion[$pareja1] == $combinacion[$pareja2]) {
        $resp = true;
        $query = "UPDATE jugador SET puntos = puntos + 1, extra = extra + $intentos WHERE login='$login'";
    } else {
        $resp = false;
        $query = "UPDATE jugador SET puntos = puntos - 1, extra = extra + $intentos WHERE login='$login'";
    }
    
    // Asumiendo que $conn está definido en alguna parte anterior del script
    $result = $conn->query($query);
    if (!$result) die("Fatal Error");

    // Reiniciar el contador de cartas levantadas
    $_SESSION['cartas_levantadas'] = 0;
}
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Bienvenid@, <?php echo $_SESSION["login"] ?></h1>
    <?php
    if(isset($resp)) {
        if ($resp) {
            echo "<h2>Acierto en las posiciones " . ($pareja1 + 1) . " y " . ($pareja2 + 1) . " después de $intentos intentos</h2>";
            echo "<p>Se le sumará 1 punto, así como $intentos intentos extra</p>";
        } else {
            echo "<h2>Fallo en las posiciones " . ($pareja1 + 1) . " y " . ($pareja2 + 1) . " después de $intentos intentos</h2>";
            echo "<p>Se le restará 1 punto, así como $intentos intentos extra</p>";
        }
        echo "<h3>Puntos por jugador</h3>";

        // Mostrar tabla de puntuaciones
        $query = "SELECT nombre, puntos, extra FROM jugador";
        $result = $conn->query($query);
        if (!$result) die("Fatal Error");
        
        echo "<table border='1'>
                <tr>
                    <th>Nombre</th>
                    <th>Puntos</th>
                    <th>Extra</th>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['nombre']) . "</td>
                    <td>" . htmlspecialchars($row['puntos']) . "</td>
                    <td>" . htmlspecialchars($row['extra']) . "</td>
                  </tr>";
        }
        
        echo "</table>";
    }
    ?>
</body>
</html>

<?php
    $conn->close();
?>