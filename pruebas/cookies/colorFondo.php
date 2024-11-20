<?php
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
  }
  
  // Establecer el color de fondo
  echo '<style>body { background-color: ' . $backgroundColor . '; }</style>';
  ?>
<form>
    <label>Seleccione de que color desea que sea la web de ahora en adelante:</label>
    <input type="radio" id="red" name="color" value="red">
    <label for="red">Rojo</label>
    <input type="radio" id="green" name="color" value="green">
    <label for="green">Verde</label>
    <input type="radio" id="blue" name="color" value="blue">
    <label for="blue">Azul</label>
    <input type="submit" value="Crear cookie">
</form>