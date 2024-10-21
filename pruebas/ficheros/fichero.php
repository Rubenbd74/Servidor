<?php
if (isset($_POST['num1'])){
    echo $_POST['num1'], " +  ", $_POST['num2'], " = ", $_POST['num1']+$_POST['num2'], "</br>";
    var_dump($_POST);
} else {
    ?>
    <html> 
      <head> 
        <title>Formulario1</title> 
      </head> 
      <body> 
        <form method="post" action="#"> 
          <label for="int">Numero 1:</label>
          <input type="text" name="num1">
          <label for="int">Numero 2:</label>
          <input type="text" name="num2">
          <input type="submit" value="Enviar">
        </form> 
      </body> 
    </html>
    <?php
}
