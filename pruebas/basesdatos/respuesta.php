<?php
session_start(); // Inicia la sesión

// Verificar si el array está disponible en la sesión
if (isset($_SESSION['colores_adivinar'])) {
    $colorAdivinar = $_SESSION['colores_adivinar'];
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el índice del color seleccionado
    $indiceSeleccionado = $_POST['0'];

    // Verificar si el color seleccionado es correcto
    if ($indiceSeleccionado === array_search($colorAdivinar[0], $_SESSION['colores'])) {
        echo "¡Correcto! El color era " . $colorAdivinar[0];
    } else {
        echo "¡Incorrecto! El color era " . $colorAdivinar[0];
    }
}

// Cerrar la sesión
session_unset();
session_destroy();
?>