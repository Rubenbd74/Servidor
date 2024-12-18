<!--Tipo de límite de archivos
El código siguiente sólo permite a los usuarios subir JPG, JPEG, PNG y GIF. Todos los 
demás tipos de archivos da un mensaje de error antes de $ uploadOk a 0:
// Permitir solo determinados formatos
<?php
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }