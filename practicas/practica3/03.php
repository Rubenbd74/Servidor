<form action="03.php" method="post">
    <label for="cadena">Introduce una cadena:</label>
    <input type="text" id="cadena" name="cadena">
    <input type="submit" value="Enviar">
</form>

<?php

/* Escribe una función que reciba una cadena y comprueba si es un palíndromo */
$cadena = $_POST['cadena'];
function isPalindrome($string)
{
    $cleanedString = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $string));
    $reversedString = strrev($cleanedString);
    return $cleanedString === $reversedString;
}

// Example usage

//$testString = "Not a palindrome";

if (isPalindrome($cadena)) {
    echo "The string ", $cadena," is a palindrome.";
} else {
    echo "The string ", $cadena," is not a palindrome.";
}