<?php

session_start();

if (!isset($_SESSION['numero_secreto'])) {
    $_SESSION['numero_secreto'] = rand(1, 100);
    $_SESSION['intentos'] = 0;
}

if (isset($_POST['intento'])) {
    $intento = $_POST['intento'];
    $_SESSION['intentos']++;

    if ($intento < $_SESSION['numero_secreto']) {
        echo "El número secreto es MAYOR que $intento <br> Inténtalo de nuevo.";
    } 
    elseif ($intento > $_SESSION['numero_secreto']) {
        echo "El número secreto es MENOR que $intento <br> Inténtalo de nuevo.";
    } 
    else {
        echo "¡Enhorabuena! Has acertado el número secreto: $_SESSION[numero_secreto] en $_SESSION[intentos] intentos.";
        echo "<br><a href='ejercicio3.php'>Jugar de nuevo</a>";
        session_destroy();
        exit;
    }
}

?>

<form action="ejercicio3.php" method="post">
    <label for="jugada">Introduce un número entre 1 y 100:</label>
    <input type="number" id="intento" name="intento" min="1" max="100">
    <input type="submit" value="Enviar">
</form>