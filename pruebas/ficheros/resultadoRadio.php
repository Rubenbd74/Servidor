<?php
$valor = $_POST["MyRadio"];

switch ($valor) {
    case 14:
        echo("<li> Menos de 14 años : eres una personita </li>");
    case 15:
        echo("<li> Entre 15 y 20 años: todavía eres muy joven </li>");
    case 21:
        echo("<li> De 21 a 40 años: eres una persona joven </li>");
    case 60:
        echo("<li> Más de 60 años: Ya eres una persona mayor </li>");
    default:
        echo("<li> Aún no me has dicho tu edad </li>");
    }