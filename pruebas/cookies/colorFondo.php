<?php
session_start();

// Verificar si la cookie existe
if (isset($_COOKIE['backgroundColor'])) {
  $backgroundColor = $_COOKIE['backgroundColor'];
} else {
  $backgroundColor = 'white'; // Valor por defecto
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $color = $_POST['color'];
  setcookie('backgroundColor', $color, time() + 30 * 24 * 60 * 60); // 30 días
  $backgroundColor = $color;
  echo 'Cookie establecida con el color de fondo: ' . $backgroundColor;
  header("Refresh:0");
}

// Establecer el color de fondo
echo '<style>body { background-color: ' . $backgroundColor . '; }</style>';
?>

<form>
  <label>Seleccione de que color desea que sea la web de ahora en adelante:</label><br>
  <input type="radio" id="red" name="color" value="red" <?php if ($backgroundColor == 'red') echo 'checked'; ?>>
  <label for="red">Rojo</label><br>
  <input type="radio" id="green" name="color" value="green" <?php if ($backgroundColor == 'green') echo 'checked'; ?>>
  <label for="green">Verde</label><br>
  <input type="radio" id="blue" name="color" value="blue" <?php if ($backgroundColor == 'blue') echo 'checked'; ?>>
  <label for="blue">Azul</label><br>
  <input type="submit" value="Crear cookie">
</form