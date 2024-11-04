<?php

$valor = " Es tu nombre O\'reilly? ";
echo $valor, "<br>";

$resultado = trim($valor);
/*Tras pasar $valor por la función trim(), $resultado = "Es tu nombre O\'reilly?" 
quitando los espacios en blanco al principio y final de la cadena*/
echo $resultado, "<br>";

$resultado = stripslashes($valor);
/*Tras pasar $valor por la función stripslashes(), $resultado = " Es tu nombre O'reilly? " quitando la contrabarra*/
echo $resultado, "<br>";
