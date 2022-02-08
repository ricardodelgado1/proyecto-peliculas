@extends('layouts.master')

@section('content')
    VER Pelicula

<div class="row">
     <div class="col-sm-4">
        {{-- TODO: Imagen de la película --}}
        <img src="{{ $arrayPeliculas['poster']}}" style="height-460px"/>
     </div>
     <div class="col-sm-8">
          {{-- TODO: Datos de la película --}}
          <h2 class="text-start mt-3">{{ $arrayPeliculas['title']}}</h2>
          <p class="text-start fs-4">Año: {{$arrayPeliculas['year']}}
              <br>
              Director: {{$arrayPeliculas['director']}}
          </p>
          <p class="lh-sm fs-5"><b>Resumen:</b>{{ $arrayPeliculas['synopsis']}}</p>
          <p class="lh-sm fs-5"><b>Estado:</b>
             {{$arrayPeliculas['rented']? 'pelicula actualmente alquilada ' : 'pelicula disponible'}}</p>
          <div class="container p-0 mt-5">

            @if ($arrayPeliculas['rented'])
                <button type="button" class="btn btn-danger">Devolver pelicula</button>
            @else
                <button type="button" class="btn btn-success">Alquilar pelicula</button>
            @endif

                 <a href="{{url('/catalog/edit/')}}">
                 <button class="btn btn-warning">
                     Editar Pelicula
                 </button>
                 </a>
                 <a href="{{url('/catalog')}}">
                     <button class="btn btn-secondary">
                         Volver al listado
                    </button>
                 </a>
          </div>
     </div>
</div>
@stop


