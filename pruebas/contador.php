<?php
    session_start();

    // Inicializa el contador
    if (!isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
    }

    // Acciones de los botones
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'mas': // Aumentar
                $_SESSION['contador']++;
                break;
            case 'menos': // Disminuir
                $_SESSION['contador']--;
                break;
            case 'cerrar': //Cerrar
                session_unset(); // Limpia todas las variables de sesión
                session_destroy(); // Destruye la sesión
                header("Location: " . $_SERVER['PHP_SELF']); // Redirige a la misma página
                exit;
        }
    }
?>


<html>
    <body>
        <h1>Contador: <?php echo $_SESSION['contador']; ?></h1>
        <form method="post">
            <button type="submit" name="boton" value="menos">-</button>
            <button type="submit" name="boton" value="mas">+</button>
            <button type="submit" name="boton" value="cerrar">Cerrar</button>
        </form>
    </body>
</html>
