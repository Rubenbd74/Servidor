<?php
    session_start();

    if (!isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
    }


    if (isset($_POST['mas'])) {
        $_SESSION['contador']++;
    }

    // Decrementa el contador
    if (isset($_POST['menos'])) {
        $_SESSION['contador']--;
    }

    // Cierra la sesión
    if (isset($_POST['cerrar'])) {
        session_unset(); // Limpia todas las variables de sesión
        session_destroy(); // Destruye la sesión
        header("Location: " . $_SERVER['PHP_SELF']); // Redirige a la misma página para refrescar
        exit;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contador Manual en PHP</title>
    </head>
    <body>
        <h1>Contador: <?php echo $_SESSION['contador']; ?></h1>
        <form method="post">
            <button type="submit" name="menos">-</button>
            <button type="submit" name="mas">+</button>
            <button type="submit" name="cerrar">Cerrar Sesión</button>
        </form>
    </body>
</html>
