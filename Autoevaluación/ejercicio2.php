<?php
    session_start();

    $binario = array(); // $bin = [rand(0,1), rand(0,1), rand(0,1), rand(0,1)]; manera mas correcta de hacerlo
    for($i=0; $i<4; $i++){
        $binario[$i][0] = rand(0,1);
    }

    $potencias = array(8, 4, 2, 1);
    $_SESSION['decimal'] = 0;

    for ($i = 0; $i < 4; $i++) {
        if ($binario[$i][0] == '1') {
            $_SESSION['decimal'] = $_SESSION['decimal'] + $potencias[$i];
        }
    }

    for ($i = 0; $i < 4; $i++) {
        if ($binario[$i][0] == '1') {
            echo "<img src='imagenes/",$potencias[$i],".JPG' alt='Carta ",$potencias[$i],"'>";
        } else {
            echo "<img src='imagenes/blanco.JPG' alt='Carta 0'>";
        }
    }
?>
<form action="ejercicio21.php" method="post">
    <label for="decimal">Introduce el número decimal:</label>
    <input type="text" id="decimal" name="decimal">
    <input type="submit" value="Enviar">
</form>
