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
//procesa la acción de levantar carta
if (isset($_POST['levantar_carta'])) {
    $carta_seleccionada = explode(' ', $_POST['levantar_carta']);
    $carta_seleccionada = end($carta_seleccionada);
    //incrementa el número de cartas levantadas
    $_SESSION['cartas_levantadas']++;
    //pone de nuevo todas las cartas boca abajo excepto la que se ha pulsado el botón
    echo "<div class='cartas'>";
    for ($i = 0; $i < 6; $i++) {
        if ($i == $carta_seleccionada - 1) {
            echo "<img src='" . $combinacion[$i] . "' alt='Carta " . ($i + 1) . "' class='carta' data-value='" . $i . "'/>";
        } else {
            echo "<img src='boca_abajo.jpg' alt='Carta " . ($i + 1) . "' class='carta' data-value='" . $i . "'/>";
        }
    }
    echo "</div>";
} else {
    $_SESSION['cartas_levantadas'] = 0;
    echo "<div class='cartas'>";
    for ($i = 0; $i < 6; $i++) {
        echo "<img src='boca_abajo.jpg' alt='Carta " . ($i + 1) . "' class='carta' data-value='" . $i . "'/>";
    }
    echo "</div>";
}
?>