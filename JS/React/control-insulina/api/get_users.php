<?php
require "config.php";

$sql = "SELECT username, name, lastname, birthdate FROM users";
$result = $conn->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);
?>
