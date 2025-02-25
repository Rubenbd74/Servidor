<?php
session_start();
require_once 'login.php';

function autenticarUsuario($login, $clave) {
    global $conn;

    // Evitar inyección SQL usando consultas preparadas
    $stmt = $conn->prepare("SELECT clave FROM jugador WHERE login=?");
    $stmt->bind_param("s",  $login);
    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario
    if ($result->num_rows === 1) {
        // Obtener la contraseña almacenada
        $claveAlmacenada = $result->fetch_assoc();

        if (!is_null($claveAlmacenada)) {
            // Verificar la contraseña introducida
            if (password_verify($clave, $claveAlmacenada['clave'])) {
                // Usuario autenticado
                return true;
            } else {
                // Usuario no autenticado
                return false;
            }
        } else {
            // No se encontró un usuario con ese login
            return false;
        }
    } else {
        // No se encontró un usuario con ese login
        return false;
    }
}

$login = '';
$clave = '';
$claveEncriptada = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $clave = $_POST["clave"];
    $qryNombre="Select nombre from jugador where login='{$_POST['login']}'";
    $us=$conn->query($qryNombre);
    $nombre=$us->fetch_assoc()['nombre'];

    // Encriptar la contraseña introducida
    $claveEncriptada = password_hash($clave, PASSWORD_DEFAULT);

    if (autenticarUsuario( $login, $claveEncriptada)) {
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

// Obtener la contraseña almacenada en la base de datos
$claveAlmacenada = $conn->query("SELECT clave FROM jugador WHERE login = '$login'")->fetch_assoc()['clave'];

// Verificar si la contraseña almacenada es válida
if (!password_verify($clave, $claveAlmacenada)) {
    // Actualizar la contraseña almacenada en la base de datos
    $contraseñaEncriptada = password_hash($clave, PASSWORD_DEFAULT);
    $conn->query("UPDATE jugador SET clave = '$claveEncriptada' WHERE login = '$login'");
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