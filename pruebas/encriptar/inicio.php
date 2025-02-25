<?php
session_start();
require_once 'logi.php';
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

?>
    <h2><?= "Bienvenid@, " . $_SESSION['nombre'] ?></h2>

    <form method="post" action="logout.php">
        <input type="submit" value="Cerrar sesión">
    </form>

<?php
$conn->close();