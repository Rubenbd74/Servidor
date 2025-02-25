<?php
    session_start();
    $target_dir = "adornos/";
    $uploadOk = 1;
    for($i=1; $i<=10; $i++){
        $_SESSION['adornos'][$i] = $target_dir . basename($_FILES["fileToUpload$i"]["name"]);
        $imageFileType = pathinfo($_SESSION['adornos'][$i],PATHINFO_EXTENSION);
        // Comprobamos si es una imagen real o falsa
         $check = getimagesize($_FILES["fileToUpload$i"]["tmp_name"]);
         if($check !== false) {
            echo "El fichero es una imagen - " . $check["mime"] . ".";
            $uploadOk = 1;
         } else {
            echo "El fichero no es una imagen.";
            $uploadOk = 0;
         }
    
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload$i"]["tmp_name"], $_SESSION['adornos'][$i])) {
                echo "El fichero " . htmlspecialchars(basename($_FILES["fileToUpload$i"]["name"])) . " ha sido subido correctamente.";
                ?><a href="arbol.php" style="text-align: left;">Mostrar el arbol</a><?php
            } 
            else {
                echo "Error al subir el fichero.";
                ?><a href="formulario.php" style="text-align: left;">Volver al formulario</a><?php
            }
        } 

    }