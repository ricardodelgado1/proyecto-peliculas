@extends('layouts.master')

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-4">
        {{-- TODO: Imagen de la película --}}
        <img src="{{ $pelicula->poster}}">

    </div>
    <div class="col-sm-8">
        {{-- TODO: Datos de la película --}}
        <h1 class="text-start fs-4">{{ $pelicula->title}}</h1s>
        <p class="text-start fs-4">Año: {{$pelicula->year}}
            <br>
            Director: {{$pelicula->director}}
        </p>
        <p class="lh-sm fs-5"><b>Resumen:</b>{{ $pelicula->synopsis}}</p>
        <p class="lh-sm fs-5"><b>Estado:</b>
            {{$pelicula->rented? 'pelicula actualmente alquilada ' : 'pelicula disponible'}}
        </p>
        <div class="container p-0 mt-5">
              <form id="formulario_eliminar"  action="{{action('CatalogController@deleteMovie', $pelicula->id)}}"style="display:inline" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline" onclick="return confirm('¿Esta seguro de eliminar esta película?')">
                        Eliminar película
                    </button>
                </form>
            @if ($pelicula->rented)
            <form action="/catalog/return/{{$pelicula->id}}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="display:inline">
                    Devolver película
                </button>
            </form>
            @else
            <form action="/catalog/rent/{{$pelicula->id}}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success" style="display:inline">
                    Alquilar película
                </button>
            </form>
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
<script type="text/javascript">
    // $('#formulario_eliminar').submit(function(e) {
    //    // e.preventDefault();
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             Swal.fire(
    //                 'Deleted!',
    //                 'Your file has been deleted.',
    //                 'success'
    //             )
    //         }
    //     })
    // })
</script>
@stop
