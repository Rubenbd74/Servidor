<html>
    <svg width="200" height="200">
        <circle cx="100" cy="100" r="50" fill=" <?php $colorAleatorio ?>" />
    </svg>
    <form>
        <input type= "submit" value="Jugar">
    </form>
</html>
<?php
  /* Hacer un random de 0 a 3 y luego un switch para cada numero asociandolos a un color
     Hacer un circulo con el style en html y por color usar la variable anterior
     <input type="hidden" name="color" value="<?php echo $color; ?>
     Si existe $POST color igualar $SESSION a $POST
     Si existe $POST tempcolor igualar a $SESSION tempcolor
     Si no existe tempcolor = black
     ">
  */
?>
<script>
  // Definimos los colores posibles
  var colores = ["#FF0000", "#0000FF", "#008000", "#FFFF00"];

  // Seleccionamos un color aleatorio
  var colorAleatorio = colores[Math.floor(Math.random() * colores.length)];

  // Obtenemos el elemento SVG
  var svg = document.querySelector("svg");

  // Obtenemos el elemento círculo
  var circulo = svg.querySelector("circle");

  // Cambiamos el color del círculo
  circulo.setAttribute("fill", colorAleatorio);
</script>
