<?php
 session_start();
$imagenes = array();

?>
<style>

    .arbol {
    width: 500px;
    margin: 0 auto;
    text-align: center;
    }

    .fila-1 {
        margin-top: 50px;
    }

    .fila-2 {
        margin-top: 20px;
    }

    .fila-3 {
        margin-top: 20px;
    }

    .fila-4 {
        margin-top: 20px;
    }

    .fila-5 {
        margin-top: 50px;
    }

    .arbol img {
        width: 100px;
        height: 100px;
        margin: 10px;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

</style>
<div class="arbol">
    <div class="fila-1">
        <img src="<?php echo $_SESSION['adornos'][1]; ?>" alt="Imagen 1">
    </div>
    <div class="fila-2">
        <img src="<?php echo $_SESSION['adornos'][2]; ?>" alt="Imagen 2">
        <img src="<?php echo $_SESSION['adornos'][3]; ?>" alt="Imagen 3">
    </div>
    <div class="fila-3">
        <img src="<?php echo $_SESSION['adornos'][4]; ?>" alt="Imagen 4">
        <img src="<?php echo $_SESSION['adornos'][5]; ?>" alt="Imagen 5">
        <img src="<?php echo $_SESSION['adornos'][6]; ?>" alt="Imagen 6">
    </div>
    <div class="fila-4">
        <img src="<?php echo $_SESSION['adornos'][7]; ?>" alt="Imagen 7">
        <img src="<?php echo $_SESSION['adornos'][8]; ?>" alt="Imagen 8">
        <img src="<?php echo $_SESSION['adornos'][9]; ?>" alt="Imagen 9">
        <img src="<?php echo $_SESSION['adornos'][10]; ?>" alt="Imagen 10">
    </div>
</div>
<a href="formulario.php" style="text-align: left;">Volver al formulario</a>

