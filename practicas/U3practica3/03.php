<form action="03.php" method="post">
    <label for="cadena">Introduce una cadena:</label>
    <input type="text" id="cadena" name="cadena">
    <input type="submit" value="Enviar">
</form>

<?php

/* Escribe una función que reciba una cadena y comprueba si es un palíndromo */
function isPalindrome($string)
{
    $cleanedString = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $string));
    $reversedString = strrev($cleanedString);
    return $cleanedString === $reversedString;
}

if (!empty($_POST['cadena'])) { //Comprobación de si $_POST está vacio
    $cadena = $_POST['cadena'];
    if (isPalindrome($cadena)) {
        echo "La cadena ", $cadena," es un palíndromo";
    } else {
        echo "La cadena ", $cadena," no es un palíndromo";
    }
}