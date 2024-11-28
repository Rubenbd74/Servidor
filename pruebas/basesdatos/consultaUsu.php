<html>
    <head>
        <title>Sesiones</title>
    </head>
    <body>

    <?php
        require_once 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Fatal Error");
        
        if (!empty($_POST['usu'])&& !empty($_POST['contra'])) {
            $input_usu = $_POST['usu'];
            $input_contra = $_POST['contra'];
        
        
            $query = "SELECT usu,contra FROM usuarios WHERE usu='$input_usu' AND 
            contra='$input_contra'";
            $result = $conn->query($query);
            
            if ($result && ($result->num_rows >0)) {
                echo'Se ha inciado sesion correctamente';
                $rows = $result->fetch_assoc(); 
        
                echo '<br>';
                echo '<strong>Usuario: </strong>' . htmlspecialchars($rows['usu']) . '<br>';
                echo '<strong>Contraseña: </strong>' . htmlspecialchars($rows['contra']) . '<br>';
            
            }
            
            else {

                echo 'No existe el usuario o la contraseña es incorrecta <br>';
                echo '<a href="consultaUsu.php">pantalla inicio</a>';
                $mostrar = false;
            }
        }
        
        else {
            $mostrar = true;
        }

        $conn->close();
    ?>
        <?php if ($mostrar === true) { ?>
            <form action ="#" method ="post">
                <label>Usuario:</label>
                <input type="text" name="usu" required>
                <label>Contraseña:</label>
                <input type="password" name="contra" required>
                <br><br>
                <a href="registro.php">Registrarse</a>
                <button type="submit" name='submit'>Iniciar Sesion</button>
            </form>
        <?php } ?>
    </body>
</html>