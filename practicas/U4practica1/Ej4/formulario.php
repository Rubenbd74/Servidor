<form method="post" action="#">
  <label for="mes">Mes:</label>
  <select name="mes">
    <?php 
      if (isset($_POST['mes'])) {
        $selected_mes = $_POST['mes'];
        for ($i = 1; $i <= 12; $i++) {
          $selected = ($i == $selected_mes) ? 'selected' : '';
          echo "<option value=\"$i\" $selected>$i</option>";
        }
      } else {
        for ($i = 1; $i <= 12; $i++) {
          echo "<option value=\"$i\">$i</option>";
        }
      }
    ?>
  </select>
  <label for="anio">Año:</label>
  <input type="text" name="anio" value="<?php echo isset($_POST["anio"]) ? $_POST["anio"] : ''; ?>">
  <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mes = $_POST["mes"];
  $anio = $_POST["anio"];
  $fecha_inicio = new DateTime("$anio-$mes-01");
  $num_dias = $fecha_inicio->format('t');
  $dia_semana = $fecha_inicio->format('N'); // Utilizamos 'N' en lugar de 'w'
}

if (isset($mes) && isset($anio)) {
    echo "<h3>Calendario del mes $mes del $anio</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th style='background-color: #0000ff; color: #ffffff'>Lunes</th>";
    echo "<th style='background-color: #0000ff; color: #ffffff'>Martes</th>";
    echo "<th style='background-color: #0000ff; color: #ffffff'>Miércoles</th>";
    echo "<th style='background-color: #0000ff; color: #ffffff'>Jueves</th>";
    echo "<th style='background-color: #0000ff; color: #ffffff'>Viernes</th>";
    echo "<th style='background-color: #0000ff; color: #ffffff'>Sábado</th>";
    echo "<th style='background-color: #0000ff; color: #ffffff'>Domingo</th>";
    echo "</tr>";
    
      $fila = 1;
      $dia_actual = 1;
      for ($i = 1; $i < $dia_semana; $i++) {
        echo "<td>&nbsp;</td>";
      }
      for ($i = 1; $i <= $num_dias; $i++) {
        echo "<td>$i</td>";
        if (($i + $dia_semana - 1) % 7 == 0) {
          echo "</tr>";
          $fila++;
          if ($i < $num_dias) {
            echo "<tr>";
          }
        }
      }
      echo "</tr>";
      echo "</table>";
    }
    ?>