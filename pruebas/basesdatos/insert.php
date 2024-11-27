<?php
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db,3306);
 if ($conn->connect_error) die("Fatal Error");


 $query = "INSERT INTO usuarios usu,contra,rol VALUES ('Yolanda','Y','jugador')";/*('".$_POST['usu']."','".$_POST['contra']."','".$_POST['rol']."')"; */
 $result = $conn->query($query);
 if (!$result) die("Fatal Error");


 if ($conn->affected_rows == 1) {
    echo "Usuario insertado correctamente";
} else {
    echo "Error al insertar usuario";
}

$conn->close();
?>