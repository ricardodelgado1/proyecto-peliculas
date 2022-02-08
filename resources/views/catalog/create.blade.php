@extends('layouts.master')

@section('content')


<h1>Formulario de creación</h1>


<form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titulo :</label>
        <input type="text" class="form-control" id="titulo" aria-describedby="emailHelp">
        <div id="tituloHelp" class="form-text">Escriba completo el titulo de la pelicula.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Año:</label>
        <input type="date" class="form-control" id="año">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Director :</label>
        <input type="text" class="form-control" id="director" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Poster :</label>
        <input type="text" class="form-control" id="poster" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Resumen :</label>
        <input type="textarea" class="form-control" id="resumen" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Añadir Pelicular</button>
</form>

@stop


