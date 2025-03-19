<?php
require "config.php";

if (!isset($_GET["username"])) {
    echo json_encode(["error" => "Falta el username"]);
    exit;
}

$sql = "DELETE FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET["username"]);

if ($stmt->execute()) {
    echo json_encode(["success" => "Usuario eliminado"]);
} else {
    echo json_encode(["error" => "Error al eliminar usuario"]);
}
?>
