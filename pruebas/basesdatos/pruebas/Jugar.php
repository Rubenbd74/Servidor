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
    <h2>Pulsa todos los botones en el orden correspondiente</h2>

    <?php
    session_start();

    function pintar_circulos($colors)
    {
        for ($i = 0; $i < 4; $i++) {
            echo '<svg width="100" height="100">';
            echo '<circle id="circle' . ($i + 1) . '" cx="50" cy="50" r="40" fill="' . $colors[$i] . '"></circle>';
            echo "</svg>";
        }
    }

    if (!isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
        $_SESSION['colors'] = ['black', 'black', 'black', 'black'];
        $_SESSION['combinacion_correcta'] = explode(',', $_POST['combinacion_correcta']);
    } else {
        if (isset($_POST['color'])) {
            $_SESSION['colors'][$_SESSION['contador']] = $_POST['color'];
            $_SESSION['contador']++;
        }
    }

    if ($_SESSION['contador'] < 4) {
        pintar_circulos($_SESSION['colors']);
        
        
        
    } else {
        pintar_circulos($_SESSION['colors']);
    
        if ($_SESSION['colors'] == $_SESSION['combinacion_correcta']) {
            header("Location: acierto.php");
        } else {
            header("Location: fallo.php");
        }
    }
    
    ?>
    
        <form method="post">
            <button type="submit" name="color" value="red" style="background-color: red;">Rojo</button>
            <button type="submit" name="color" value="blue" style="background-color: blue;">Azul</button>
            <button type="submit" name="color" value="yellow" style="background-color: yellow;">Amarillo</button>
            <button type="submit" name="color" value="green" style="background-color: green;">Verde</button>
        </form>
</body>
</html>





