<?php

  $randcolores = array();
  for ($i = 0; $i < 4; $i++) {
      $randcolores[] = rand(0, 3);
  }

  $colorAleatorio = array();
  foreach ($randcolores as $valor){
    switch($valor){
      case 0:
        $colorAleatorio[] = "yellow";
      case 1:
        $colorAleatorio[] = "blue";
      case 2:
        $colorAleatorio[] = "red";
      case 3:
        $colorAleatorio[] = "green";  
    }
  }

?>

<html>
    <div style="display: flex; justify-content: space-between;">
      <div style="width: 50px; height: 50px; border-radius: 50%; background-color: <?php echo $colorAleatorio[0] ?>;"></div>
      <div style="width: 50px; height: 50px; border-radius: 50%; background-color: <?php echo $colorAleatorio[1] ?>;"></div>
      <div style="width: 50px; height: 50px; border-radius: 50%; background-color: <?php echo $colorAleatorio[2] ?>;"></div>
      <div style="width: 50px; height: 50px; border-radius: 50%; background-color: <?php echo $colorAleatorio[3] ?>;"></div>
    </div>
    
    <form>
        <input type= "submit" value="Jugar">
    </form>
</html>
<?php

  /*<svg width="200" height="200">
        <circle cx="100" cy="100" r="50" fill=" <?php $colorAleatorio ?>" />
    </svg>-->*/
  /* Hacer un random de 0 a 3 y luego un switch para cada numero asociandolos a un color
     Hacer un circulo con el style en html y por color usar la variable anterior
     <input type="hidden" name="color" value="<?php echo $color; ?>
     Si existe $POST color igualar $SESSION a $POST
     Si existe $POST tempcolor igualar a $SESSION tempcolor
     Si no existe tempcolor = black
     ">
  */
?>