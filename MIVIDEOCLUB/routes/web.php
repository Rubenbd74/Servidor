<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {   //public/
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

Route::get('pagina3/{name?}', function($name = null)    //public/pagina3/elnombre  //el interrogante hace que sea opcional
{
return 'Hola '. $name;
});

Route::get('pagina3/{name?}', function($name = 'Rubén')  // También podemos poner algún valor por defecto... public/pagina3/
{
return 'Hola '. $name;
});

//Podemos usar expresiones regulares para validar los parámetros

Route::get('pagina4/{name}', function($name)
{
//
})
->where('name', '[A-Za-z]+');

Route::get('pagina4/{id}', function($id)
{
//
})
->where('id', '[0-9]+');

// Si hay varios parámetros podemos validarlos usando un array:
Route::get('pagina4/{id}/{name}', function($id, $name)
{
//
})
->where(array('id' => '[0-9]+', 'name' => '[A-Za-z]+'));*/

Route::get('/', function () {
    return 'Pantalla principal';
});

Route::get('/login', function () {
    return 'Login usuario';
});
Route::get('/logout', function () {
    return 'Logout del usuario';
});
Route::get('/catalog', function () {
    return 'Listado de peliculas';
});

Route::get('/catalog/show/{id}', function ($id) {
    return 'Vista detalle película '. $id;
});

Route::get('/catalog/create', function () {
    return 'Añadir película';
});

Route::get('catalog/edit/{id}', function ($id) {
    return 'Modificar pelicula '. $id;
});