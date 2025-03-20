<?php
session_start();

$respuesta = $_POST['decimal'];
$solucion = $_SESSION['decimal'];

if ($respuesta == $solucion) {
  echo "¡Correcto! El número decimal es $solucion.";
  echo "<br><a href='ejercicio2.php'>Jugar de nuevo</a>";
} else {
  echo "Error. El número decimal correcto es $solucion.";
  echo "<br><a href='ejercicio2.php'>Jugar de nuevo</a>";
}
