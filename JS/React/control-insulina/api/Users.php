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
            $usuario = getUsuarioById($id, $pdo);
            echo json_encode($usuario ?: ['error' => "No se encontró ningún usuario con ID $id."]);
        } else {
            $usuarios = getAllUsuarios($pdo);
            echo json_encode($usuarios);
        }
        break;
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['fecha_nacimiento'], $input['nombre'], $input['apellidos'], $input['usuario'], $input['contra'])) {
            $nuevaUsuarioId = createUsuario($input, $pdo);
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
            $actualizada = updateUsuarioById($input['id_usu'], $input, $pdo);
            echo json_encode(['updated_rows' => $actualizada]);
        } else {
            http_response_code(400); // Código de error: solicitud incorrecta
            echo json_encode(['error' => 'Datos incompletos para actualizar el usuario.']);
        }
        break;
    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['id'])) {
            $resultado = deleteUsuarioById($input['id'], $pdo);
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

function obtenerUsuarios() {
    global $conn;
    $sql = "SELECT id_usu, fecha_nacimiento, nombre, apellidos, usuario FROM usuario";
    $result = $conn->query($sql);
    
    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);
}

function agregarUsuario() {
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data['fecha_nacimiento'], $data['nombre'], $data['apellidos'], $data['usuario'], $data['contra'])) {
        http_response_code(400);
        echo json_encode(["message" => "Datos incompletos"]);
        return;
    }
    
    $fecha_nacimiento = $data['fecha_nacimiento'];
    $nombre = $data['nombre'];
    $apellidos = $data['apellidos'];
    $usuario = $data['usuario'];
    $contra = password_hash($data['contra'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO usuario (fecha_nacimiento, nombre, apellidos, usuario, contra) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fecha_nacimiento, $nombre, $apellidos, $usuario, $contra);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Usuario agregado exitosamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Error al agregar usuario"]);
    }
}

function actualizarUsuario() {
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data['id_usu'], $data['nombre'], $data['apellidos'], $data['usuario'])) {
        http_response_code(400);
        echo json_encode(["message" => "Datos incompletos"]);
        return;
    }
    
    $id_usu = $data['id_usu'];
    $nombre = $data['nombre'];
    $apellidos = $data['apellidos'];
    $usuario = $data['usuario'];
    
    $sql = "UPDATE usuario SET nombre = ?, apellidos = ?, usuario = ? WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $apellidos, $usuario, $id_usu);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Usuario actualizado exitosamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Error al actualizar usuario"]);
    }
}

function borrarUsuario() {
    global $conn;
    parse_str(file_get_contents("php://input"), $data);
    
    if (!isset($data['id_usu'])) {
        http_response_code(400);
        echo json_encode(["message" => "ID de usuario requerido"]);
        return;
    }
    
    $id_usu = $data['id_usu'];
    $sql = "DELETE FROM usuario WHERE id_usu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usu);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Usuario eliminado exitosamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Error al eliminar usuario"]);
    }
}
?>
