<?php
session_start();
$conexion = mysqli_connect("localhost","root","", "bdsimon") or die('No se ha podido conectar');
mysqli_query($conexion,"SET CHARACTER SET utf8");

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: Inicio.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>

<form action="index.php" method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario" required><br><br>
    <label for="clave">Contraseña:</label>
    <input type="password" name="clave" id="clave" required><br><br>
    <input type="submit" value="Iniciar sesión">
</form>