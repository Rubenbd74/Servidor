<?php
    
    if (isset( $_POST["MyRadio"])) {
        $valor = $_POST["MyRadio"];

        switch ($valor) {
            case 14:
                echo("<li> Menos de 14 años : eres una personita </li>");
                break;
            case 15:
                echo("<li> Entre 15 y 20 años: todavía eres muy joven </li>");
                break;
            case 21:
                echo("<li> De 21 a 40 años: eres una persona joven </li>");
                break;
            case 60:
                echo("<li> Más de 60 años: Ya eres una persona mayor </li>");
                break;
        }
    } 
    else { 
        echo("<li>Aún no me has dicho tu edad</li>");
    }
   