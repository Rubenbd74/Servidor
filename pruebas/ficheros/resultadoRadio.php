<?php
$valor = $_POST["MyRadio"];

if($valor == 14)
{
    echo("<li> Menos de 14 años : eres una personita </li>");
}

else if ($valor == 15)
{
    echo("<li> Entre 15 y 20 años: todavía eres muy joven </li>");
}

else if ($valor == 21)
{
    echo("<li> De 21 a 40 años: eres una persona joven </li>");
}

else if ($valor == 60)
{
    echo("<li> Más de 60 años: Ya eres una persona mayor </li>");
}

else ("<li> Aún no me has dicho tu edad </li>");
