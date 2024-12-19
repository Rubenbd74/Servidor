<!DOCTYPE html>
<html>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Seleccionar 10 imagenes: <br><br>
            <?php
                for ($i = 1; $i <= 10; $i++) {?>
                    <label for="file<?php echo $i; ?>">Imagen <?php echo $i; ?>:</label><?php echo "<input type='file' name='fileToUpload$i' id='fileToUpload$i'><br>" ?>
            <?php }?><br>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </body>
</html>