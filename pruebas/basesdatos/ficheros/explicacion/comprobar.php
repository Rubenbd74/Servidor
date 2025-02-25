<!--Compruebe si el archivo ya existe
Ahora podemos añadir algunas restricciones.
En primer lugar, vamos a comprobar si el archivo ya existe en el "uploads" carpeta. Si lo 
hace, se mostrará un mensaje de error y $ uploadOk se establece en 0: -->

<?php
    // Comprobamos si el fichero ya existe 

    if (file_exists($target_file)) {
        echo "El fichero existe.";
        $uploadOk = 0;
    }