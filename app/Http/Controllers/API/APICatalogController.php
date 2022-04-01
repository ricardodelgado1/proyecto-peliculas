<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Movie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pe = new Movie();
        $pe->title = $request->title;
        $pe->year = $request->year;
        $pe->director = $request->director;
        $pe->poster = $request->poster;
        $pe->rented = false;
        $pe->synopsis = $request->synopsis;
        $result = $pe->save();
        return response()->json([Movie::findOrFail($id),
        'msg'=>'Pelicula creada Correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pelicula= Movie::findOrFail($id);
        return $pelicula;
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
        //
        $pelicula= Movie::findOrFail($id);

        $pelicula->title=$request->title;
        $pelicula->year=$request->year;
        $pelicula->director=$request->director;
        $pelicula->poster=$request->poster;
        $pelicula->synopsis=$request->synopsis;

        $pelicula->save();

        return response()->json([Movie::findOrFail($id),
        'msg'=>'La película ha sido actualizada!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pelicula = Movie::findOrFail($id);
        $pelicula->delete();

        return response()->json(['error'=>false,
        'msg'=>'La película ha sido eliminada!']);
    }


    public function putRent($id)
    {
        //
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented=true;
        $pelicula->save();
        return response()->json(['error'=>false,
        'msg'=>'La película ha sido alquilada']);
    }


    public function putReturn($id)
    {
        //
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented=false;
        $pelicula->save();
        return response()->json(['error'=>false,
        'msg'=>'La película ha sido devuelta']);
    }

}
