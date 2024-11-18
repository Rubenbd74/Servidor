<?php
    session_start();

    $binario = array();
    for($i=0; $i<4; $i++){
        $binario[$i][0] = rand(0,1);
    }

    $potencias = array(8, 4, 2, 1);
    $decimal = 0;
    for ($i = 0; $i < 4; $i++) {
        if ($binario[$i][0] == '1') {
            $decimal += $potencias[$i];
        }
    }

    $_SESSION['decimal'] = $decimal;

    for ($i = 0; $i < 4; $i++) {
        if ($binario[$i][0] == '1') {
            echo "<img src='imagenes/",$potencias[$i],".JPG' alt='Carta ",$potencias[$i],"'>";
        } else {
            echo "<img src='imagenes\blanco.JPG' alt='Carta 0'>";
        }
    }
?>
<form action="ejercicio21.php" method="post">
    <label for="decimal">Introduce el número decimal:</label>
    <input type="text" id="decimal" name="decimal">
    <input type="submit" value="Enviar">
</form>
