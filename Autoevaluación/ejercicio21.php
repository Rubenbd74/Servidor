<?php
session_start();

$respuesta = $_POST['decimal'];
$solucion = $_SESSION['decimal'];

if ($respuesta == $solucion) {
  echo "¡Correcto! El número decimal es $solucion.";
} else {
  echo "Error. El número decimal correcto es $solucion.";
}
