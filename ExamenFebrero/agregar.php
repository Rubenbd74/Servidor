<?php 
    require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir datos</title>
    
</head>
<body>
    <h3>Añadir datos agenda</h3>
    <form action="" method="post">
        <div>
            <label for="date">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
        </div>
        <div>
            <label for="time">Hora:</label>
            <input type="time" id="hora" name="hora" required>
        </div>
        <div>
            <label for="text">Persona:</label>
            <input type="text" id="persona" name="persona" required>
        </div>
        <div>
            <label for=""></label>
            <input type="radio" name="imagen"><? echo '[$imagenes].jpg'?>imagen:1<br>
        </div>
    </form>
    <?php
    /* Volvemos a hacer un for con la sesion y guardamos los  */
   /*  Datos de cada formulario en una variable */
        for ($i=1;$i<=$_SESSION['contador']+1; $i++) {
            $nombre = $_POST['nombre'.$i];
            $email = $_POST['email'.$i];
            $telf = $_POST['telefono'.$i];
    /* Y ahora lo insertamos */
            $query = "INSERT INTO contactos (nombre,email,telefono,codusuario) VALUES ('$nombre', '$email', '$telf', $cod)";
   /*  Guardamos la inserción en una variable resultado */
    //& Si da error de id duplicada en 0 es porque no esta en auto increment usa ALTER TABLE contactos MODIFY codcontacto INT AUTO_INCREMENT;
            $result = $connection->query($query);
    /* Y si el resultado sale mal nos da error */
            if (!$result) die("Fatal Error");
        }
        $connection->close();
        
    ?>
    <!-- Ponemos el contador que habiamos inciado antes en otro archivo y le sumamos uno para saber el 
    El número total de usuarios -->
    <p>Se han grabado los <?php echo  $_SESSION['contador']+1;?> contactos de <?php echo  $_SESSION['usu'];?></p>
    <a href="index.php">Volver a loguearse</a><br>
    <a href="inicio.php">Introducir más contactos para <?php echo  $_SESSION['usu'];?></a><br>
    <a href="totales.php">Total de contactos guardados</a><br>
    
</body>
</html>