<?php
 require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db,3306);
 if ($conn->connect_error) die("Fatal Error");


 $query = "SELECT usu,contra,rol FROM usuarios"; //rol
 $result = $conn->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 


for ($j = 0; $j < $rows; ++$j) {
    $result->data_seek($j); 
    $row = $result->fetch_assoc(); 


    echo 'Usuario: ' . htmlspecialchars($row['usu']) . '<br>';
    echo 'Contraseña: ' . htmlspecialchars($row['contra']) . '<br>'; 
    echo 'Rol: ' . htmlspecialchars($row['rol']) . '<br><br>'; 

}

$conn->close();
echo 'Usuario: ' . htmlspecialchars($row['usu']) . '<br>';
?> 