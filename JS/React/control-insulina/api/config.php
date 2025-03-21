<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "insulina_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta a la base de datos (por ejemplo, obtener todos los usuarios)
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $users = array();
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    // Devolver los resultados en formato JSON
    echo json_encode($users);
} else {
    echo json_encode([]);
}

?>