<?php
session_start();

$usu = 'pepito';
$contraseña = '123';

if (isset($_POST['usu']) && isset($_POST['contraseña'])) {
    if ($_POST['usu'] == $usu && $_POST['contraseña'] == $contraseña) {
        echo 'Bienvenido';
    } else {
        echo 'Usuario y/o contraseña incorrectos';
    }
}

?>
<form action="prueba.php" method="post">
    <label for="usu">Usuario:</label>
    <input type="text" name="usu"><br><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña"><br><br>
    <input type="submit" value="Entrar">
</form>