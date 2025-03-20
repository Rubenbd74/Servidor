@extends('layouts.master')
@section('content')Vista detalle película

<h1>Películas</h1>

<ul>
    @foreach($peliculas as $pelicula)
        <li>
            <h2>{{ $pelicula->titulo }}</h2>
            <p>Año: {{ $pelicula->año }}</p>
            <p>Director: {{ $pelicula->director }}</p>
            <p>Poster: <img src="{{ $pelicula->poster }}" alt="Poster"></p>
            <p>Alquilado: {{ $pelicula->alquilado ? 'Sí' : 'No' }}</p>
            <p>Sinopsis: {{ $pelicula->sinopsis }}</p>
        </li>
    @endforeach
</ul>

@stop