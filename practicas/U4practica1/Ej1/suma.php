<?php
    if (isset($_POST['num1']) && isset($_POST['num2'])){
        $suma = $_POST['num1'] + $_POST['num2'];
        echo "La suma de ", $_POST['num1'], " + ", $_POST['num2'], " es ", $suma, "</br>";
        var_dump($_POST);
    }