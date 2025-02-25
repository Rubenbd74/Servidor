<!-- Límite de tamaño del archivo
El campo de entrada de archivo en el formulario HTML anterior se 
denomina "fileToUpload" .
Ahora, queremos comprobar el tamaño del archivo. Si el archivo es mayor que 500 kb, se 
muestra un mensaje de error y $ uploadOk se establece en 0: -->

<?php
    // Check file size

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "El fichero es demasiado grande.";
        $uploadOk = 0;
    }