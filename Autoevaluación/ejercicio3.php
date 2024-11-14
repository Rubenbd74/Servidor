<?php
/*
Vamos a escribir una aplicación web en PHP para jugar al juego del número secreto.
Es un juego clásico que consiste en lo siguiente: el ordenador elegirá un número al azar entre 1 y 100 y el jugador tendrá que averiguarlo. 
Cada vez que el jugador haga un intento, la aplicación le indicará si el número secreto es mayor o menor que el número introducido.
Página 3
Cuando el jugador por fin acierte, la aplicación le dará la enhorabuena y le indicará cuántos intentos ha necesitado para averiguar el 
número secreto. Utilizaremos variables de sesión. El ejercicio se resolverá en un único fichero llamado ejercicio3.php
El juego se inicia con la siguiente pantalla, en ella el usuario debe introducir un número entre 1 y 100.
Una vez introducido el número ha de indicar si el menor o mayor al generado aleatoriamente y se ha de mostrar el resultado en una 
pantalla como la que se puede ver debajo. Seguir jugando nos llevará de nuevo a la pantalla anterior a volver a introducir un nuevo 
número.
Una vez se acierte se muestra la siguiente pantalla. Sigue jugando en este caso iniciará de nuevo el juego.
a) Generar un número aleatorio y el formulario para introducir la jugada (0,5 puntos).
b) Calcular, si el número introducido es mayor o menor y mostrar el resultado de forma repetida (2 puntos).
c) Mostrar el resultado y volver a iniciar el juego (1 punto)
*/

session_start();

if (!isset($_SESSION['numero_secreto'])) {
    $_SESSION['numero_secreto'] = rand(1, 100);
    $_SESSION['intentos'] = 0;
}

if (isset($_POST['intento'])) {
    $intento = $_POST['intento'];
    $_SESSION['intentos']++;

    if ($intento < $_SESSION['numero_secreto']) {
        echo "El número secreto es mayor que $intento. Inténtalo de nuevo.";
    } elseif ($intento > $_SESSION['numero_secreto']) {
        echo "El número secreto es menor que $intento. Inténtalo de nuevo.";
    } else {
        echo "¡Enhorabuena! Has acertado el número secreto en $_SESSION[intentos] intentos.";
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