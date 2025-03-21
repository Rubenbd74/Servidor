<?php
require "config.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    obtenerEstadisticas();
} else {
    http_response_code(405);
    echo json_encode(["message" => "Método no permitido"]);
}

function obtenerEstadisticas() {
    global $conn;
    
    $sql = "SELECT AVG(lenta) AS media, MIN(lenta) AS minima, MAX(lenta) AS maxima FROM control_glucosa";
    $result = $conn->query($sql);
    
    if ($result) {
        $estadisticas = $result->fetch_assoc();
        echo json_encode($estadisticas);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Error al obtener estadísticas"]);
    }
}
?>
