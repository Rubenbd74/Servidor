<?php
require "config.php";  
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $usuario = getUsuarioById($id);
            echo json_encode($usuario ?: ['error' => "No se encontró ningún usuario con ID $id."]);
        } else {
            $usuarios = getAllUsuarios();
            echo json_encode($usuarios);
        }
        break;
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['fecha_nacimiento'], $input['nombre'], $input['apellidos'], $input['usuario'], $input['contra'])) {
            $nuevaUsuarioId = createUsuario($input);
            http_response_code(201); // Código de creación exitosa
            echo json_encode(['id_usu' => $nuevaUsuarioId]);
        } else {
            http_response_code(400); // Código de error: solicitud incorrecta
            echo json_encode(['error' => 'Datos incompletos para crear el usuario.']);
        }
        break;
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['id_usu'], $input['fecha_nacimiento'], $input['nombre'], $input['apellidos'], $input['usuario'], $input['contra'])) {
            $actualizada = updateUsuarioById($input['id_usu'], $input);
            echo json_encode(['updated_rows' => $actualizada]);
        } else {
            http_response_code(400); // Código de error: solicitud incorrecta
            echo json_encode(['error' => 'Datos incompletos para actualizar el usuario.']);
        }
        break;
    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['id'])) {
            $resultado = deleteUsuarioById($input['id']);
            echo json_encode(['message' => "Usuario con ID {$input['id']} eliminado correctamente.", 'deleted_rows' => $resultado]);
        } else {
            http_response_code(400); // Código de error: solicitud incorrecta
            echo json_encode(['error' => 'ID de usuario no proporcionado para eliminar.']);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Método no permitido"]);
        break;
}

// Obtener todos los usuarios
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

// Obtener un usuario por ID
function getUsuarioById($id) {
    global $conn;
    $sql = "SELECT id_usu, fecha_nacimiento, nombre, apellidos, usuario FROM usuario WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Crear un nuevo usuario
function createUsuario($data) {
    global $conn;
    $fecha_nacimiento = $data['fecha_nacimiento'];
    $nombre = $data['nombre'];
    $apellidos = $data['apellidos'];
    $usuario = $data['usuario'];
    $contra = password_hash($data['contra'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (fecha_nacimiento, nombre, apellidos, usuario, contra) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fecha_nacimiento, $nombre, $apellidos, $usuario, $contra);
    
    if ($stmt->execute()) {
        return $stmt->insert_id;  // Devuelve el ID del nuevo usuario
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Error al agregar el usuario."]);
    }
}

// Actualizar un usuario por ID
function updateUsuarioById($id_usu, $data) {
    global $conn;
    $nombre = $data['nombre'];
    $apellidos = $data['apellidos'];
    $usuario = $data['usuario'];
    
    $sql = "UPDATE usuario SET nombre = ?, apellidos = ?, usuario = ? WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $apellidos, $usuario, $id_usu);
    
    if ($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Error al actualizar el usuario."]);
    }
}

// Eliminar un usuario por ID
function deleteUsuarioById($id_usu) {
    global $conn;
    $sql = "DELETE FROM usuario WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usu);
    
    if ($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Error al eliminar el usuario."]);
    }
}
?>
