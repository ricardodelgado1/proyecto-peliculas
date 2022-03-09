@extends('layouts.master')

@section('content')


<h1>Formulario de creación</h1>


<form action="" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titulo :</label>
        <input type="text"  name="title" class="form-control" id="titulo" aria-describedby="emailHelp">
        <div id="tituloHelp" class="form-text">Escriba completo el titulo de la pelicula.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Año:</label>
        <input type="text" name="year" class="form-control" id="año">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Director :</label>
        <input type="text" name="director" class="form-control" id="director" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Poster :</label>
        <input type="text" name="poster" class="form-control" id="poster" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
             <label for="synopsis">Resumen</label>
             <textarea name="synopsis" id="synopsis" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Añadir Pelicular</button>
</form>

@stop


