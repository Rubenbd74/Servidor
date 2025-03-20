<?php
require_once 'conexion.php';

$stmt = $conn->prepare("SELECT * FROM imagenes");
    //$imagen->fetch_assoc()['imagen'];
    //$imagenes = ;
?>
<h1>Listado pictogramas</h1>
<div class="row">
    <table><?php
        for ($i = 0; $i < 2; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 4; $j++) {
                echo "<td><img src= [$imagenes].jpg'></td>";
            }
            echo "</tr>";
        }?>
    </table>
</div>
