<?php

session_start();

require_once 'inicio.php';

if(isset($_POST['Enviar'])) {
    $solucion = $_POST['solucion'];
    
    $login = $_SESSION["login"];
    
    if ($solucion == $a) {
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