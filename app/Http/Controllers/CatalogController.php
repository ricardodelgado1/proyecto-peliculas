<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Pelicula;
use App\Models\Movie;

class CatalogController extends Controller
{

    public function getIndex()
    {
        $pelis= Movie::all();
        return view('catalog.index', ['pelis'=>$pelis]);

       /*  return view('catalog.index', ['arrayPeliculas' => $this->arrayPeliculas]); */
    }
    public function getShow($id)
    {
        $pelicula= Movie::findOrFail($id);
        return view('catalog.show', ['pelicula' => $pelicula,'id'=>$id]);

       /*  return view('catalog.show', ['arrayPeliculas' => $this->arrayPeliculas[$id]]); */
    }
    public function getCreate()
    {
        return view('catalog.create');
    }
    public function getEdit($id)
    {
        $pelicula= Movie::findOrFail($id);
        return view('catalog.edit', ['pelicula' => $pelicula,'id'=>$id]);
/*
        return view('catalog.edit', ['arrayPeliculas' => $this->arrayPeliculas[$id]]); */
    }
}
