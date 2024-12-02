<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Círculos de colores</title>
    <style>
        svg {
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Simon</h1>
    <h2>Lo siento has fallado la combinacion</h2>
    <?php
    function pintar_circulos($colors)
    {
        for ($i = 0; $i < 4; $i++) {
            echo '<svg width="100" height="100">';
            echo '<circle id="circle' . ($i + 1) . '" cx="50" cy="50" r="40" fill="' . $colors[$i] . '"></circle>';
            echo "</svg>";
        }
    }

    session_start();

    session_destroy();
    ?>

    <a href="Inicio.php" style="text-align: left;">Volver a jugar</a>
</body>
</html>
