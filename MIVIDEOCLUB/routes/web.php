<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Hola Mundo";
    //return view('welcome'); //Nos muestra la vista MIVIDEOCLUB/resources/views/welcome.blade.php
});

Route::get('pagina1', function () {
    return ('Estas en la pagina 1');
});
