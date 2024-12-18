<!-- El "upload.php" archivo contiene el código para cargar un archivo:-->

<?php
    $target_dir = "uploads";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Comprobamos si es una imagen real o falsa
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "El fichero es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else {
        echo "El fichero no es una imagen.";
        $uploadOk = 0;
    }

/*Aclaraciones sobre el script
$ target_dir = "uploads/" - indica el directorio donde se coloca el archivo
$ Target_file especifica la ruta del archivo sea cargado
$ uploadOk = 1 no se utilizatodavía (will be used later)
$ ImageFileType tiene la extensión de archivo del archivo
A continuación, compruebe si el archivo de imagen es una imagen real o una imagen 
falsa
Nota: tendrá que crear un nuevo directorio llamado "uploads" en el directorio 
donde "upload.php" reside el archivo. Los archivos subidos se guardarán allí.*/