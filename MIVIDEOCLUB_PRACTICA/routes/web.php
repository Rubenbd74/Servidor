<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return 'Pantalla principal';
    return view('home');
});

Route::get('/login', function () {
    //return 'Login usuario';
    return view('login');
});
Route::get('/logout', function () {
    //return 'Logout del usuario';
    return view('logout');
});
Route::get('/catalog', function () {
    //return 'Listado de peliculas';
    return view('catalog.index');
});

Route::get('/catalog/show/{id}', function ($id) {
    //return 'Vista detalle película '. $id;
    return view('catalog.show', array('id'=>$id));
});

Route::get('/catalog/create', function () {
    //return 'Añadir película';
    return view('catalog.create');
});

Route::get('catalog/edit/{id}', function ($id) {
    return 'Modificar pelicula '. $id;});
    return view('catalog.edit', array('id'=>$id));