<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mibd";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "CREATE DATABASE mibd";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada con éxito\n";
} else {
    echo "Error al crear la base de datos: " . $conn->error . "\n";
}

$conn->select_db("mibd");

$sql = "CREATE TABLE mi_tabla (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla creada con éxito\n";
} else {
    echo "Error al crear la tabla: " . $conn->error . "\n";
}

$sql = "INSERT INTO mi_tabla (nombre) VALUES ('pepe')";
if ($conn->query($sql) === TRUE) {
    echo "Registro insertado con éxito\n";
} else {
    echo "Error al insertar el registro: " . $conn->error . "\n";
}

$conn->close();
?>