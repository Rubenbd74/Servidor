<?php
if (isset($_POST['nombre'])){
    echo "Nombre: ", $_POST['nombre'], "</br>";
    echo "Apellidos: ", $_POST['apellidos'], "</br>";
} else {
    ?>
    <html> 
      <head> 
        <title>Formulario1</title> 
      </head> 
      <body> 
        <form method="post" action="#"> 
          <label for="text">Nombre:</label>
          <input type="text" name="nombre">
          <label for="text" name="apellidos">Apellidos:</label>
          <input type="text" name="apellidos">
          <input type="submit" value="Enviar">
        </form> 
      </body> 
    </html>
    <?php
}
