<?php
    if (!isset($_POST['enviar'])) {
    //Formulario
    ?>
    <form action="" method="post">
        <table><?php
        for ($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 2; $j++) {
                echo "<td><input type='text' name='matriz[$i][$j]'></td>";
            }
            echo "</tr>";
        }?>
        </table>
        <input type="submit" name="enviar" value="Enviar">
    </form><?php
    } else {
        //Validar
        $matriz = $_POST['matriz'];
        $error = false;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $numero = $matriz[$i][$j];
                if (!is_numeric($numero) || $numero < 1 || $numero > 100) {
                    $error = true;
                    echo "Error: El valor introducido en la posición ($i, $j) no es válido. Debe ser un número entre 1 y 100.";
                    echo "<br><a href='",$_SERVER['PHP_SELF']."'>Volver a intentarlo</a>";
                }
            }
        }
        if (!$error) {
            //Solucion
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 2; $j++) {
                    $numero = $matriz[$i][$j];
                    $binario = decbin($numero);
                    echo "$numero = $binario<br>";
                }
            }
        }
    }