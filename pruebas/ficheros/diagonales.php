<?php
    if(empty($_POST["dimension"]) && empty($_POST["calcular"])){?>
        <form method="post" action="#">
            <label for="dimension">Dimension </label>
            <label for="matriz"> Matriz</label><br>
            <select name="dimension">
                <option value="3" selected>3</option>
            </select>
            <input type="submit" value="Pintar">
        </form>
    <?php
    }
    else {?>
        <form method="post" action="#"><?php
            for($i=0; $i<3; $i++){
                for($j=0; $j<3; $j++){?>
                    <label for="<?php echo "(". $i. ",". $j. ")" ?>"><?php echo "(". $i. ",". $j. ")"?></label>
                    <input type="text" name="<?php echo "matriz_".$i.".".$j ?>" value="">
                <?php
                }?><br> 
            <?php
            }?>
            <br><input type="submit" name="calcular" value="Calcular diagonales">
        </form>
        <?php
        if(isset($_POST["calcular"])){
            $matriz = array();
            for ($i=0; $i<3; $i++){
                for($j=0; $j<3; $j++){
                    $matriz[$i][$j] = $_POST["matriz_".$i."_".$j];
                }
            }
            calcularDiagonales($matriz);
        }
    }
  


    function calcularDiagonales($matriz) {

        // Calculamos la diagonal principal
        $diagonal_principal = $matriz[0][0] + $matriz[1][1] + $matriz[2][2];
      
        // Calculamos la diagonal secundaria
        $diagonal_secundaria = $matriz[0][2] + $matriz[1][1] + $matriz[2][0];
      
        // Mostramos los resultados
        echo "Diagonal principal: " . $diagonal_principal . "<br>";
        echo "Diagonal secundaria: " . $diagonal_secundaria . "<br>";
        echo "Suma de diagonales: " . ($diagonal_principal + $diagonal_secundaria) . "<br>";
      }