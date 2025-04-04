<?php
session_start(); // Inicia la sesión

// Verificar si el array está disponible en la sesión
if (isset($_SESSION['colores_adivinar'])) {
    $colorAdivinar = $_SESSION['colores_adivinar'];
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los colores seleccionados
    $coloresSeleccionados = $_POST;

    // Verificar si alguno de los colores seleccionados es correcto
    foreach ($coloresSeleccionados as $color) {
        if ($color === $colorAdivinar[0]) {
            echo "¡Correcto! El color era " . $colorAdivinar[0];
        } else {
            echo "¡Incorrecto! El color era " . $colorAdivinar[0];
        }
    }
}

// Cerrar la sesión
session_unset();
session_destroy();
?>