<?php
function pintar_circulos($col1, $col2, $col3, $col4) {
    echo "<svg width='100' height='100'>";
    echo "<circle id='circle1' cx='50' cy='50' r='40' fill='" . $col1 . "'/>";
    echo "<circle id='circle2' cx='150' cy='50' r='40' fill='" . $col2 . "'/>";
    echo "<circle id='circle3' cx='50' cy='150' r='40' fill='" . $col3 . "'/>";
    echo "<circle id='circle4' cx='150' cy='150' r='40' fill='" . $col4 . "'/>";
    echo "</svg>";
}
?>