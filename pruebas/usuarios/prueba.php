<form action="" method="post">
    <label for="usu">Usuario:</label>
    <input type="text" name="usu"><br><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña"><br><br>
    <label for="registrarse"><?php echo "<a href='registrarse.php'>Registrarse:</a>" ?></label>
    <input type="submit" value="Entrar">
</form>

<?php
session_start();

$usu = 'pepito';
$contraseña = '123';

if (isset($_POST['usu']) && isset($_POST['contraseña'])) {
    if ($_POST['usu'] == $usu && $_POST['contraseña'] == $contraseña) {
        echo 'Usuario y contraseña correctos <br> Bienvenido ', $_POST['usu'];
    } else {
        echo 'Usuario y/o contraseña incorrectos';
    }
}
?>