<?php
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db,3306);
 if ($conn->connect_error) die("Fatal Error");


 $query = "DELETE FROM usuarios (usu, contra, rol) VALUES ('Yolanda','Y','jugador')";
 $result = $conn->query($query);
 if (!$result) die("Fatal Error");


 if ($conn->affected_rows == 1) {
    echo "Usuario insertado correctamente";
} else {
    echo "Error al insertar usuario";
}

$conn->close();
?>