<?php
session_start();
require_once 'login.php';
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

?>
    <h2><?= "Bienvenid@, " . $_SESSION['nombre'] ?></h2>
    <img src='imagen/20241212.jpg' alt='jeroglifico'/>";
    <form action='' method='post'>
        <label for="solucion">Solucion al jeroglífico:</label>
        <input type="text" id="solucion" name="solucion" required><br>
        <input type='submit' name='Enviar' value='Enviar'/><br><br>
    </form>
    <a href="puntos.php" style="text-align: left;">Ver puntos por jugador</a>
    <a href="resultado.php" style="text-align: left;">Resultados del dia</a>

<?php
if (isset($_POST['Enviar'] , $_POST['solucion'] )) {
    $qryInsert="INSERT INTO respuestas (fecha,login,hora,respuesta) values ('{2024-12-12}','{$_SESSION['login']}','{13:32:10}',{$_POST['solucion']})";
    $conn = new mysqli($hn,$user,$pw,$db);
    $conn->query($qryInsert);
    };