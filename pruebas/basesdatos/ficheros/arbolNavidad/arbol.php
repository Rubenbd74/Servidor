<?php
$imagenes = array();
for ($i = 1; $i <= 10; $i++) {
    $imagenes[] = "adornos/" . $_FILES["fileToUpload$i"]["name"];
}

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
        <img src="<?php echo $imagenes[0]; ?>" alt="Imagen 1">
    </div>
    <div class="fila-2">
        <img src="<?php echo $imagenes[1]; ?>" alt="Imagen 2">
        <img src="<?php echo $imagenes[2]; ?>" alt="Imagen 3">
    </div>
    <div class="fila-3">
        <img src="<?php echo $imagenes[3]; ?>" alt="Imagen 4">
        <img src="<?php echo $imagenes[4]; ?>" alt="Imagen 5">
        <img src="<?php echo $imagenes[5]; ?>" alt="Imagen 6">
    </div>
    <div class="fila-4">
        <img src="<?php echo $imagenes[6]; ?>" alt="Imagen 7">
        <img src="<?php echo $imagenes[7]; ?>" alt="Imagen 8">
        <img src="<?php echo $imagenes[8]; ?>" alt="Imagen 9">
        <img src="<?php echo $imagenes[9]; ?>" alt="Imagen 10">
    </div>
</div>

