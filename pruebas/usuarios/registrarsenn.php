<form action="prueba.php" method="post">
    <label for="usu">Usuario:</label>
    <input type="text" name="usu"><br><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña"><br><br>
    <label for="contraseña">Confirmar Contraseña:</label>
    <input type="password" name="contraseña1"><br>
    <label for="rol">Rol:</label><br>
    <input type="radio" name="rol" value="Estandar">Estandar<br>
    <input type="radio" name="rol" value="Premium">Premium<br>
    <input type="submit" value="Registrar">
</form>

<?php
session_start();

if (isset($_POST['usu']) && isset($_POST['contraseña']) && isset($_POST['contraseña1'])) {
    if ($_POST['contraseña'] == $_POST['contraseña1']) {
        $_SESSION['usu'] = $_POST['usu'];
        $_SESSION['contraseña'] = $_POST['contraseña'];
        echo 'Se ha registrado correctamente el usuario ', $_POST['usu'], ' con rol ', $_POST['rol'], '<br> <a href="acceso.php">Acceder</a>';
    } else {
        echo 'Las contrasenas no coinciden';
    }
}