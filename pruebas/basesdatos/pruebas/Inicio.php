<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circulos de colores</title>
</head>
<body>
    <h1>Simon</h1>
    <h2>Hola, memoriza la siguiente combinacion</h2>
    
    <?php
    session_start();
    $paleta = ["red", "blue", "yellow", "green"];
    $_SESSION['colorandom']  = rand(0, 3);
    $_SESSION['colorandom2'] = rand(0, 3);
    $_SESSION['colorandom3'] = rand(0, 3);
    $_SESSION['colorandom4'] = rand(0, 3);

    $colorandom  = $_SESSION['colorandom'];
    $colorandom2 = $_SESSION['colorandom2'];
    $colorandom3 = $_SESSION['colorandom3'];
    $colorandom4 = $_SESSION['colorandom4'];

    $col1 = $paleta[$colorandom];
    $col2 = $paleta[$colorandom2];
    $col3 = $paleta[$colorandom3];
    $col4 = $paleta[$colorandom4];

    function color($col1, $col2, $col3, $col4)
    {
        $colores = [$col1, $col2, $col3, $col4];
        for ($i = 0; $i < 4; $i++) {
            echo '<svg width="100" height="100">';
            echo '<circle cx="50" cy="50" r="40" fill="' . $colores[$i] . '"></circle>';
            echo "</svg>";
        }
    }
    color($col1, $col2, $col3, $col4);
    $_SESSION['combinacion_correcta'] = [$col1, $col2, $col3, $col4];
    ?>
    

    <form action="Jugar.php" method="get">
        <input type="hidden" name="combinacion_correcta" value="<?php echo implode(',', $combinacion_correcta); ?>"/>
        <input type="submit" name="submit" value="Vamos a jugar">
    </form>
</body>
</html>
