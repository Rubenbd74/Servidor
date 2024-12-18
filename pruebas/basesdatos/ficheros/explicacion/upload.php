<?php
    $target_dir = "uploads";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Comprobamos si es un archivo de texto
    if($imageFileType != "txt" ) {
        echo "El fichero no es un archivo de texto, .txt";
        $uploadOk = 0;
    }
    else{
        echo "El fichero es un archivo de texto, .txt";
        $uploadOk = 1;
    }
