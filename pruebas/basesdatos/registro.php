<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usu = $_POST['usu'];
    $pass = $_POST['pass'];
    $conf = $_POST['conf'];

    $rol = isset($_POST['rol']) ? $_POST['rol'] : 'jugador';

    if ($pass === $conf) {
        
        if (isset($_SESSION['usuarios'][$usu])) {
            echo "Error: Ya existe un usuario con ese nombre. Elige otro.<br>";
            echo '<a href="registro.php">Volver al registro</a>';
        } else {
            
            $_SESSION['usuarios'][$usu] = [
                'password' => $pass,
                'rol' => $rol,
            ];
            echo "Registro exitoso. Bienvenido, $usu. Tu rol es: $rol.<br>";
            echo '<a href="acceso.php">Ir al inicio de sesión</a>';
        }
    } else {
        echo "Error: Las contraseñas no coinciden. Por favor, vuelve a intentarlo.<br>";
        echo '<a href="registro.php">Volver al registro</a>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="POST" action="registro.php">
        Nombre: <input type="text" name="usu" required><br><br>
        Contraseña: <input type="password" name="pass" required><br><br>
        Confirmar contraseña: <input type="password" name="conf" required><br><br>
        Rol:<br>
        Jugador <input type="radio" name="rol" value="jugador" checked><br>
        <input type="submit" value="REGISTRARSE">
    </form>
</body>
</html>
