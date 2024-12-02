<?php
session_start();

$colors = ['red', 'blue', 'yellow', 'green'];
$randomColors = $_SESSION['randomColors'];

if (isset($_POST['color'])) {
    $color = $_POST['color'];
    $randomColors[$_POST['turn']] = array_search($color, $colors);
    $_SESSION['randomColors'] = $randomColors;
    if (count(array_filter($randomColors, 'isNull')) == 0) {
        header("Location: acierto.php");
    }
}

?>
<form action="Jugar.php" method="POST">
    <?php
    for ($i = 0; $i < 4; $i++) {
        echo '<svg width="100" height="100">';
        echo '<circle id="circle' . ($i + 1) . '" cx="50" cy="50" r="40" fill="black"></circle>';
        echo "</svg>";
    }
    ?>
    <?php
    for ($i = 0; $i < 4; $i++) {
        echo '<input type="submit" name="color" value="' . $colors[$i] . '" style="background-color: ' . $colors[$i] . '">';
    }
    ?>
    <input type="hidden" name="turn" value="<?php echo isset($_POST['turn']) ? $_POST['turn'] + 1 : 0; ?>">
</form>