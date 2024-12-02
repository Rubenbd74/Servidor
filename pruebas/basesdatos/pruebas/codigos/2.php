<?php
session_start();

$colors = ['red', 'blue', 'green', 'yellow'];
$randomColors = array_rand($colors, 4);
$_SESSION['randomColors'] = $randomColors;

?>
<form action="Jugar.php" method="POST">
    <h1>Simon</h1>
    <h2>Hola, memoriza la siguiente combinacion</h2>
    <?php
    for ($i = 0; $i < 4; $i++) {
        echo '<svg width="100" height="100">';
        echo '<circle id="circle' . ($i + 1) . '" cx="50" cy="50" r="40" fill="' . $colors[$randomColors[$i]] . '"></circle>';
        echo "</svg>";
    }
    ?>
    <input type="submit" name="submit" value="Vamos a jugar">
</form>