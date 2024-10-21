<form method="GET" action="#">
    <label for="int">Numero de Elementos:</label>
    <input type="text" name="valor">
    <input type="submit" value="Enviar"><br><br>
    <?php
        if (!empty($_GET["valor"])) {
            $valor = $_GET["valor"];
            for ($i = 0; $i < $valor; $i++) {
                ?>
                    <label for="caja<?php echo $i; ?>">
                    Campo <?php echo $i; ?>:
                    </label>
                    <input type="text" name="caja<?php echo $i; ?>" id="caja<?php echo $i; ?>"><br>
                <?php
            }
            ?>
                <input type="submit" value="Enviar">
            <?php
        }
    ?>
</form>