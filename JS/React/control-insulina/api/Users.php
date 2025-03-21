<?php
require "config.php";  

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:3000");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

ob_clean();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $usuario = getUsuarioById($id);
            echo json_encode($usuario ?: ['error' => "No se encontró ningún usuario con ID $id."]);
        } else {
            echo json_encode(getAllUsuarios());
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        error_log("Datos recibidos: " . print_r($input, true));
        
        if (!isset($input['fecha_nacimiento'], $input['nombre'], $input['apellidos'], $input['usuario'], $input['contra'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos incompletos para crear el usuario.']);
            exit;
        }
        
        $nuevaUsuarioId = createUsuario($input);
        http_response_code(201);
        echo json_encode(['id_usu' => $nuevaUsuarioId]);
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['id_usu'], $input['fecha_nacimiento'], $input['nombre'], $input['apellidos'], $input['usuario'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos incompletos para actualizar el usuario.']);
            exit;
        }

        $actualizada = updateUsuarioById($input['id_usu'], $input);
        echo json_encode(['updated_rows' => $actualizada]);
        break;

    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['id_usu'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID de usuario no proporcionado para eliminar.']);
            exit;
        }

        $resultado = deleteUsuarioById($input['id_usu']);
        echo json_encode(['message' => "Usuario eliminado correctamente.", 'deleted_rows' => $resultado]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}

function getAllUsuarios() {
    global $conn;
    $sql = "SELECT id_usu, fecha_nacimiento, nombre, apellidos, usuario FROM usuario";
    $result = $conn->query($sql);
    
    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    return $usuarios;
}

function getUsuarioById($id) {
    global $conn;
    $sql = "SELECT id_usu, fecha_nacimiento, nombre, apellidos, usuario FROM usuario WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function createUsuario($data) {
    global $conn;
    $fecha_nacimiento = $data['fecha_nacimiento'];
    $nombre = $data['nombre'];
    $apellidos = $data['apellidos'];
    $usuario = $data['usuario'];
    $contra_hashed = password_hash($data['contra'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO usuario (fecha_nacimiento, nombre, apellidos, usuario, contra) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        error_log("Error en prepare: " . $conn->error);
        return null;
    }

    $stmt->bind_param("sssss", $fecha_nacimiento, $nombre, $apellidos, $usuario, $contra_hashed);

    if (!$stmt->execute()) {
        error_log("Error en execute: " . $stmt->error);
        return null;
    }

    return $stmt->insert_id;
}

function updateUsuarioById($id_usu, $data) {
    global $conn;
    $sql = "UPDATE usuario SET nombre = ?, apellidos = ?, usuario = ? WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $data['nombre'], $data['apellidos'], $data['usuario'], $id_usu);

    return $stmt->execute() ? $stmt->affected_rows : 0;
}

function deleteUsuarioById($id_usu) {
    global $conn;
    $sql = "DELETE FROM usuario WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usu);

    return $stmt->execute() ? $stmt->affected_rows : 0;
}
?>
