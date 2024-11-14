<?php
/*
Se ha de reproducir el siguiente juego, a partir de un número en binario de cuatro dígitos generado de forma aleatoria, se ha de construir la 
representación gráfica mediante cartas de dicho número, de forma, que según las potencias de 2 se han de pintar las cartas correspondientes.
El ejercicio se ha de resolver con dos ficheros ejercicio2.php y ejercicio21.php.
El jugador introducirá el número en decimal y ha de obtener uno de los siguientes resultados
a) Generar un vector con el número binario de 4 posiciones. (0,5 puntos).
b) Calcular, utilizando un segundo vector que inicializamos con potencias de dos, el número asociado en decimal. (1 punto)A 
c) Representación gráfica de las cartas. (1 punto)
d) Guardar el número generado en decimal en sesiones para poder compararlo en el introducido por el usuario en un formulario. (1 
punto)
e) Mostrar el resultado ambos resultados correctamente. (0,5 puntos)
*/
session_start();

$binario = array();
for($i=0; $i<4; $i++){
    $binario[$i][0] = rand(0,1);
}

$potencias = array(8, 4, 2, 1);
$decimal = 0;
for ($i = 0; $i < 4; $i++) {
  if ($binario[$i][0] == '1') {
    $decimal += $potencias[$i];
  }
}

$_SESSION['decimal'] = $decimal;

for ($i = 0; $i < 4; $i++) {
    if ($binario[$i][0] == '1') {
        echo "<img src='imagenes/".$potencias[$i].".JPG' alt='Carta ".$potencias[$i]."'>";
    } else {
        echo "<img src='imagenes\blanco.JPG' alt='Carta 0'>";
    }
}

?>
<form action="ejercicio21.php" method="post">
  <label for="decimal">Introduce el número decimal:</label>
  <input type="text" id="decimal" name="decimal">
  <input type="submit" value="Enviar">
</form>