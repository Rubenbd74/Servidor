<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['login'])) {
    header("Location: entrada.php");
    exit();
}

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
?><html>
    <h1><?= "Bienvenid@, " . $_SESSION['login'] ?></h1>
    <p><?=  "Cartas levantadas: $cartas_levantadas" ?></p>
    <form action='' method='post'>
        <input type='submit' name='levantar_carta' value='Levantar carta 1'/>
        <input type='submit' name='levantar_carta' value='Levantar carta 2'/>
        <input type='submit' name='levantar_carta' value='Levantar carta 3'/>
        <input type='submit' name='levantar_carta' value='Levantar carta 4'/>
        <input type='submit' name='levantar_carta' value='Levantar carta 5'/>
        <input type='submit' name='levantar_carta' value='Levantar carta 6'/>
    </form>
    <form action='' method='post'>
        <label for='pareja1'>Pareja 1:</label>
        <input type='number' id='pareja1' name='pareja1' min='1' max='6'/>
        <label for='pareja2'>Pareja 2:</label>
        <input type='number' id='pareja2' name='pareja2' min='1' max='6'/><br/>
        <input type='submit' name='comprobar' value='Comprobar'/>
    </form>
<?php
// Muestra las cartas boca abajo
echo "<div class='cartas'>";
for ($i = 0; $i < 6; $i++) {
    echo "<img src='boca_abajo.jpg' alt='Carta " . ($i + 1) . "' class='carta' data-value='" . $i . "'/>";
}
echo "</div>";

// Procesa la acción de levantar carta
if (isset($_POST['levantar_carta'])) {
    $carta_seleccionada = explode(' ', $_POST['levantar_carta']);
    $carta_seleccionada = end($carta_seleccionada);
    // Muestra la carta seleccionada
    echo "<div class='carta seleccionada' data-value='" . $carta_seleccionada . "'><img src='" . $combinacion[$carta_seleccionada - 1] . "' alt='Carta " . $carta_seleccionada . "'/></div>";
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