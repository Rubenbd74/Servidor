<?php
session_start();

// Genera una combinación de 6 cartas aleatoria en parejas de 2
$cartas = array(
    "copas_02.jpg",
    "copas_03.jpg",
    "copas_05.jpg"
);

$combinacion = array();
$pares = array_rand($cartas, 3); // Genera 3 pares de cartas

for ($i = 0; $i < 3; $i++) {
    $combinacion[] = $cartas[$pares[$i]];
    $combinacion[] = $cartas[$pares[$i]];
}

// Mezcla la combinación para que las cartas estén en orden aleatorio
shuffle($combinacion);

// Inicializa las variables de juego
$cartas_levantadas = 0;
$pares_seleccionados = array();

// Muestra la pantalla de juego
echo "<h1>Bienvenid@, " . $_SESSION['usuario'] . "</h1>";
echo "<p>Cartas levantadas: $cartas_levantadas</p>";
echo "<form action='' method='post'>";
for ($i = 0; $i < 6; $i++) {
    echo "<button name='levantar_carta' value='" . ($i + 1) . "'>Levantar carta " . ($i + 1) . "</button> ";
}
echo "</form>";
echo "<p>Pareja 1: <input type='number' name='pareja1' min='1' max='6' value=''></p>";
echo "<p>Pareja 2: <input type='number' name='pareja2' min='1' max='6' value=''></p>";
echo "<button name='comprobar'>Comprobar</button>";

// Muestra las cartas boca abajo
echo "<div class='cartas'>";
for ($i = 0; $i < 6; $i++) {
    echo "<img src='boca_abajo.jpg' alt='Carta " . ($i + 1) . "'>";
}
echo "</div>";

// Procesa la acción de levantar carta
if (isset($_POST['levantar_carta'])) {
    $carta_seleccionada = $_POST['levantar_carta'];
    // Muestra la carta seleccionada
    echo "<img src='" . $combinacion[$carta_seleccionada - 1] . "' alt='Carta " . $carta_seleccionada . "'>";
    // Incrementa el número de cartas levantadas
    $cartas_levantadas++;
}

// Procesa la acción de comprobar
if (isset($_POST['comprobar'])) {
    // Comprueba si las parejas seleccionadas son correctas
    $pareja1 = $_POST['pareja1'];
    $pareja2 = $_POST['pareja2'];
    // ...
}
?>