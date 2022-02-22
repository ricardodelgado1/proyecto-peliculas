@extends('layouts.master')

@section('content')
    VER Pelicula

<div class="row">
     <div class="col-sm-4">
        {{-- TODO: Imagen de la película --}}
        <img src="{{ $pelicula->poster}}"><!--
        <img src="{{ $pelicula['poster']}}" style="height-460px"> -->
     </div>
     <div class="col-sm-8">
          {{-- TODO: Datos de la película --}}
          <h2 class="text-start mt-3">{{ $pelicula->title}}</h2>
          <p class="text-start fs-4">Año: {{$pelicula->year}}
              <br>
              Director: {{$pelicula->director}}
          </p>
          <p class="lh-sm fs-5"><b>Resumen:</b>{{ $pelicula->synopsis}}</p>
          <p class="lh-sm fs-5"><b>Estado:</b>
             {{$pelicula->rented? 'pelicula actualmente alquilada ' : 'pelicula disponible'}}</p>
          <div class="container p-0 mt-5">

            @if ($pelicula->rented)
                <button type="button" class="btn btn-danger">Devolver pelicula</button>
            @else
                <button type="button" class="btn btn-success">Alquilar pelicula</button>
            @endif

                 <a href="{{url('/catalog/edit/'.$pelicula->id)}}">
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


