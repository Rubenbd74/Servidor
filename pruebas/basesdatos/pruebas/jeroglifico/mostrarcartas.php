<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['login'])) {
    header("Location: entrada.php");
    exit();
}

// Genera una combinación aleatoria de 6 cartas con combinaciones de 2
$cartas = array(
    "copas_02.jpg",
    "copas_03.jpg",
    "copas_05.jpg"
);

if (!isset($_SESSION['combinacion'])) {
    $combinacion = array();
    $pares = array_rand($cartas, 3); 
    //genera 3 pares de cartas
    for ($i = 0; $i < 3; $i++) {
        $combinacion[] = $cartas[$pares[$i]];
        $combinacion[] = $cartas[$pares[$i]];
    }

    //mezcla la combinación para que las cartas estén en orden aleatorio
    shuffle($combinacion);

    $_SESSION['combinacion'] = $combinacion;
} else {
    $combinacion = $_SESSION['combinacion'];
}

//inicializa las variables de juego
if (!isset($_SESSION['cartas_levantadas'])) {
    $_SESSION['cartas_levantadas'] = 0;
}

//muestra la pantalla de juego
?>
    <h1><?= "Bienvenid@, " . $_SESSION['login'] ?></h1>
    <p><?=  "Cartas levantadas: " . $_SESSION['cartas_levantadas'] ?></p>
    <form action='' method='post'>
        <?php for ($i = 1; $i <= 6; $i++) { ?>
            <input type='submit' name='levantar_carta' value='Levantar carta <?= $i ?>'/>
        <?php } ?>
    </form>
    <form action='' method='post'>
        <label for='pareja1'>Pareja 1:</label>
        <input type='number' id='pareja1' name='pareja1' min='1' max='6'/>
        <label for='pareja2'>Pareja 2:</label>
        <input type='number' id='pareja2' name='pareja2' min='1' max='6'/><br/>
        <input type='submit' name='comprobar' value='Comprobar'/>
    </form>
    <style>
        .carta {
            width: 260px; height: 400px;
            margin: 10px; 
            display: inline-block;
        }
    </style>

<?php
//levantar carta
if (isset($_POST['levantar_carta'])) {
    $carta_seleccionada = explode(' ', $_POST['levantar_carta']);
    $carta_seleccionada = end($carta_seleccionada);

    $_SESSION['cartas_levantadas']++;
    //pone de nuevo todas las cartas boca abajo menos la levantada
    echo "<div class='cartas'>";
    for ($i = 0; $i < 6; $i++) {
        if ($i == $carta_seleccionada - 1) {
            echo "<img src='" . $combinacion[$i] . "' alt='Carta " . ($i + 1) . "' class='carta' data-value='" . $i . "'/>";
        } else {
            echo "<img src='boca_abajo.jpg' alt='Carta " . ($i + 1) . "' class='carta' data-value='" . $i . "'/>";
        }
    }
    echo "</div>";
} 
else {
    $_SESSION['cartas_levantadas'] = 0;
    echo "<div class='cartas'>";
    for ($i = 0; $i < 6; $i++) {
        echo "<img src='boca_abajo.jpg' alt='Carta " . ($i + 1) . "' class='carta' data-value='" . $i . "'/>";
    }
    echo "</div>";
}

//A partir de aqui modifica el codigo para que funcione con las variables de la parte anterior del codigo

// Comprobar pareja
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