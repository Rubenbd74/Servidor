<?php 
   /* $mascota = array('Perro' => "Yunito", 
        'Gato' => "Wilson", 
        'Canario' => "Piolin", 
        'Tortuga' => "Rafael"); 
    foreach($mascota as $item => $description) 
    echo "$item: $description<br>"; */

    $mascota = array(

        'Perro' => array( 
            'Mastin'=> 'Yunito',
            'Salchicha'=> 'Fuet',
            'Chiguagua'=> 'Sarnoso'
        ),

        'Gato' => array(
            'Persa' => 'Otis',
            'Comun' => 'Garfield',
            'Siames' => 'Princesa'
        )
    );

    foreach($mascota as $animal => $tipo) 
        foreach($tipo as $raza => $nombre)
        echo "$animal:\t$raza\t($nombre)<br>";