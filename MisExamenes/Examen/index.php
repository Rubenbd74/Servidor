<?php
session_start();
require_once 'login.php';

function autenticarUsuario($login, $clave) {
    global $conn;

    // Evitar inyección SQL usando consultas preparadas
    $stmt = $conn->prepare("SELECT * FROM jugador WHERE login=? AND clave=?");
    $stmt->bind_param("ss",  $login, $clave);
    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario
    if ($result->num_rows === 1) {
        // Usuario autenticado
        return true;
    } else {
        // Usuario no autenticado
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $clave = $_POST["clave"];
    $qryNombre="Select nombre from jugador where login='{$_POST['login']}'";
    $us=$conn->query($qryNombre);
    $nombre=$us->fetch_assoc()['nombre'];
    if (autenticarUsuario( $login, $clave)) {
        // Usuario autenticado, establecer la sesión y redirigir a la página principal
        $_SESSION["login"] = $login;
        $_SESSION["nombre"] = $nombre;
        header("Location: inicio.php");
        exit();
    } else {
        // Usuario no autenticado, mostrar mensaje de error
        $error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

    <h2>Iniciar sesión</h2>

    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="login">Usuario:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>