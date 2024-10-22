<form method="GET" action="resultadoFormularioDinamico.php">
<?php

for ($i = 0; $i < 3; $i++) {
      ?>
        <label for=" caja<?php echo $i; ?>"> 
            Campo <?php echo $i; //Te imprime el valor de $i actual para cada label ?> :
        </label>
        <input type="text" name=" caja<?php echo $i; ?>" id=" caja<?php echo $i; ?>"><br>
    <?php 
    }
    ?>
    <input type="submit" value="Enviar">    
</form>

<?php
/*echo <<<_END
    <label for= $i>$i:</label>
    <input type="text" id="num1" name="$i" required><br>
    _END;
}
echo<<<_END
    <input type="submit" value="Enviar">
    */