<?php
require "config.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["username"], $data["password"], $data["name"], $data["lastname"], $data["birthdate"])) {
    echo json_encode(["error" => "Datos incompletos"]);
    exit;
}

$passwordHash = password_hash($data["password"], PASSWORD_BCRYPT);
$sql = "INSERT INTO users (username, password, name, lastname, birthdate) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $data["username"], $passwordHash, $data["name"], $data["lastname"], $data["birthdate"]);

if ($stmt->execute()) {
    echo json_encode(["success" => "Usuario agregado"]);
} else {
    echo json_encode(["error" => "Error al agregar usuario"]);
}
?>
