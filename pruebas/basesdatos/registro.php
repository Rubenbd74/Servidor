<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db, 3306);
if ($conn->connect_error) die("Fatal Error");

$mostrar = true;

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usu = $_POST['usu'];
    $contra = $_POST['contra'];
    $conf = $_POST['conf'];
    $rol = isset($_POST['rol']) ? $_POST['rol'] : 'jugador';

    if ($contra === $conf) {

        $query = "SELECT * FROM usuarios WHERE usu = '$usu'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            echo "Error: Ya existe un usuario con ese nombre. Elige otro.<br>";
            echo '<a href="registro.php">Volver al registro</a>';
            $mostrar = false;
        } 
        
        else {

            $query = "INSERT INTO usuarios (usu, contra, rol) VALUES ('$usu', '$contra', '$rol')";
            $result = $conn->query($query);
            if (!$result) die("Fatal Error");

            if ($conn->affected_rows == 1) {
                echo "Usuario insertado correctamente <br>";
            } else {
                echo "Error al insertar usuario <br>";
            }
            echo '<a href="consultaUsu.php">Ir al inicio de sesión</a>';
            $mostrar = false;
        }
    } 
    
    else {
        echo "Error: Las contraseñas no coinciden. Por favor, vuelve a intentarlo.<br>";
        echo '<a href="registro.php">Volver al registro</a>';
        $mostrar = false;
    }
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
    <body>
        <h2>Registro</h2>
        <?php if ($mostrar === true) { ?>
        <form method="POST" action="registro.php">
            Nombre: <input type="text" name="usu" required><br><br>
            Contraseña: <input type="password" name="contra" required><br><br>
            Confirmar contraseña: <input type="password" name="conf" required><br><br>
            Rol:<br>
            Jugador <input type="radio" name="rol" value="jugador" checked><br>
            <input type="submit" value="REGISTRARSE">
        </form>
        <?php } ?>
    </body>
</html>
