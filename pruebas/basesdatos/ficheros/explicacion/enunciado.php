<!-- 
En primer lugar, asegúrese de que PHP está configurado para permitir la carga de 
archivos. En su "php.ini" archivo, busque la directiva file_uploads, y configurarlo en On:
file_uploads = On

Creamos un formulario HTML que permiten a los usuarios elegir el archivo de imagen 
que desea cargar: -->
<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
Seleccionar un fichero:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
<!--
Algunas reglas a seguir para el formulario HTML anterior:
 Asegúrar de que el formulario utiliza method = "post"
 El formulario también necesita el following atributo: enctype = "/ form-data 
multiparte". Se especifica que el tipo de contenido a utilizar cuando enviar el 
formulario
Sin los requisitos anteriores, la carga de archivos no funcionará.
Otras cosas a destacar:
 El type="file" atributo de la <input> etiqueta muestra el campo de entrada como un 
archivo de control de selección, con un "Browse" botón situado junto al control de 
entrada
El formulario anterior envía datos a un archivo llamado "upload.php" , lo que vamos a 
crear otra.
El "upload.php" archivo contiene el código para cargar un archivo:
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Comprobamos si es una imagen real o falsa
 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
 if($check !== false) {
 echo "El fichero es una imagen - " . $check["mime"] . ".";
 $uploadOk = 1;
 } else {
 echo "El fichero no es una imagen.";
 $uploadOk = 0;
 }

/*
Aclaraciones sobre el script
$ target_dir = "uploads/" - indica el directorio donde se coloca el archivo
$ Target_file especifica la ruta del archivo sea cargado
$ uploadOk = 1 no se utilizatodavía (will be used later)
$ ImageFileType tiene la extensión de archivo del archivo
A continuación, compruebe si el archivo de imagen es una imagen real o una imagen 
falsa
Nota: tendrá que crear un nuevo directorio llamado "uploads" en el directorio 
donde "upload.php" reside el archivo. Los archivos subidos se guardarán allí.
Compruebe si el archivo ya existe
Ahora podemos añadir algunas restricciones.
En primer lugar, vamos a comprobar si el archivo ya existe en el "uploads" carpeta. Si lo 
hace, se mostrará un mensaje de error y $ uploadOk se establece en 0:*/
// Comprobamos si el fichero ya existe 

if (file_exists($target_file)) {
 echo "El fichero existe.";
 $uploadOk = 0;
}
/*
Límite de tamaño del archivo
El campo de entrada de archivo en el formulario HTML anterior se 
denomina "fileToUpload" .
Ahora, queremos comprobar el tamaño del archivo. Si el archivo es mayor que 500 kb, se 
muestra un mensaje de error y $ uploadOk se establece en 0:*/

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
 echo "El fichero es demasiado grande.";
 $uploadOk = 0;
}
/*
Tipo de límite de archivos
El código siguiente sólo permite a los usuarios subir JPG, JPEG, PNG y GIF. Todos los 
demás tipos de archivos da un mensaje de error antes de $ uploadOk a 0:*/

// Permitir solo determinados formatos
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 $uploadOk = 0;
}    
