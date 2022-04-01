<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return $movies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pe = new Movie();
        $pe->title = $request->title;
        $pe->year = $request->year;
        $pe->director = $request->director;
        $pe->poster = $request->poster;
        $pe->rented = 1;
        $pe->synopsis = $request->synopsis;
        $pe->save();
        return response()->json(['error' => false, 'msg' => 'Pelicula Creada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peli = Movie::findOrFail($id);
        return  \response($peli);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pelicula = Movie::find($id);
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->synopsis = $request->synopsis;

        $result = $pelicula->save();
        // self::Movie($pelicula, $request);
        return response('Película Editada!!', 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->rented = 0;
        $pelicula->synopsis = $request->synopsis;

        $pelicula->save();
        return response()->json(['error' => false, 'msg' => 'La película ha sido actualizada!']);

        // $movie=Movie::findOrFail($id);
        // $titulo =request('title');
        // $anio=request('year');
        // $director=request('director');
        // $poster=request('poster');
        // $synopsis=request('synopsis');

        //     $movie->title=$titulo;
        //     $movie->year=$anio;
        //     $movie->director=$director;
        //     $movie->poster=$poster;
        //     $movie->synopsis=$synopsis;

        //     $movie->save();
        //     return response()->json(['error'=>false, 'msg'=>'La película ha sido actualizada!']);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->delete();
        return response()->json([
            'error' => false,
            'msg' => 'La película ha sido eliminada!'
        ]);
    }

    public function putRent($id)
    {
        $peli = Movie::findOrFail($id);
        $peli->rented = true;
        $peli->save();
        return response()->json([
            'error' => false,
            'msg' => 'La película ha sido alquilada'
        ]);
    }
    public function putReturn($id)
    {
        $peli = Movie::findOrFail($id);
        $peli->rented = false;
        $peli->save();
        return response()->json([
            'error' => false,
            'msg' => 'La película ha sido devuelta'
        ]);
    }
}
