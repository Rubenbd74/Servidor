<?php
session_start();

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

// Elimina las cartas "boca_abajo" de la combinación
$combinacion = array_diff($combinacion, ["boca_abajo.jpg"]);

// Mezcla la combinación para que las cartas estén en orden aleatorio
shuffle($combinacion);

echo "<h1>Jeroglífico del día</h1>";
echo "<div class='cartas'>";
for ($i = 0; $i < 6; $i++) {
    echo "<img src='" . $combinacion[$i] . "' alt='Carta " . ($i + 1) . "'>";
}
echo "</div>";
?>