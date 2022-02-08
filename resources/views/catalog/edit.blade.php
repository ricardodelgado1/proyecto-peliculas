@extends('layouts.master')

@section('content')

<h1>Modificar pelicula</h1>


<form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titulo :</label>
        <input type="text" class="form-control" id="titulo" aria-describedby="emailHelp" value="{{$arrayPeliculas['title']}}">
    </div>
    <div class="mb-3" >
        <label for="exampleInputPassword1" class="form-label">Año:</label>
        <input type="number" class="form-control" id="año" value="{{$arrayPeliculas['year']}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Director :</label>
        <input type="text" class="form-control" id="director" aria-describedby="emailHelp" value="{{$arrayPeliculas['director']}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Poster :</label>
        <input type="text" class="form-control" id="poster" aria-describedby="emailHelp" value="{{$arrayPeliculas['poster']}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Resumen :</label>
        <textarea class="form-control" name="" id="" rows="3">{{$arrayPeliculas['synopsis']}}</textarea>

    </div>
    <button type="submit" class="btn btn-primary">Modificar Pelicula</button>
</form>
@stop
