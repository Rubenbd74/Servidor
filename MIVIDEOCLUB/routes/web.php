<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {   //public/
    echo "Hola Mundo";
    //return view('welcome'); //Nos muestra la vista MIVIDEOCLUB/resources/views/welcome.blade.php
});

Route::get('pagina1', function () { //public/pagina1
    return ('Estas en la pagina 1');
});

Route::get('pagina2/{id}', function($id)   //public/pagina2/1
{
return 'Usuario '.$id;
});

Route::get('pagina3/{name?}', function($name = null)    //public/pagina3  //el interrogante hace que sea opcional
{
return 'Hola' +$name;
});
// También podemos poner algún valor por defecto...
Route::get('pagina3/{name?}', function($name = 'Javi')
{
return $name;
});