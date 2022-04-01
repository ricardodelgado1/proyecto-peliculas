<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Pelicula;
use App\Models\Movie;

class CatalogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $pelis= Movie::all();

        //connectify('success','success','Catalogo Encontrado!');
        return view('catalog.index', ['pelis'=>$pelis]);

        //return $pelis;

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

    public function postCreate(Request $request){

        /* $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:8',
            'director' => 'required|string|max:64',
            'poster' => 'required|string|max:255',
            'synopsis' => 'required|string',
        ]);
 */
        $pelicula= new Movie;
        $pelicula->title=$request->title;
        $pelicula->year=$request->year;
        $pelicula->director=$request->director;
        $pelicula->poster=$request->poster;
        $pelicula->synopsis=$request->synopsis;


        $pelicula->save();//->delete();

       notify()->success('¡Pelicula Agregada!');
        // notify()->emotify('success', '¡Pelicula Agregada!');
        return redirect('catalog');
       // return redirect()->action('CatalogController@getIndex');

    }
    public function putEdit(Request $request,$id){

        //$pelicula=new Movie();
         /* $request->validate([
             'title' => 'required|string|max:255',
             'year' => 'required|string|max:8',
             'director' => 'required|string|max:64',
             'poster' => 'required|string|max:255',
             'synopsis' => 'required|string',
         ]); */
         $pelicula= Movie::findOrFail($id);

         $pelicula->title=$request->title;
         $pelicula->year=$request->year;
         $pelicula->director=$request->director;
         $pelicula->poster=$request->poster;
         $pelicula->synopsis=$request->synopsis;

         $pelicula->save();
         //drakify('error');

        notify()->success('!Pelicula Editada!','Exito');
         return redirect('/catalog/show/'.$id);
    }

    public function putRent(Request $request,$id){
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->rented=true;
        $pelicula->save();
        notify()->success('Película Alquilada con Exito!!');
        return redirect()->action([CatalogController::class,'getShow'],array('id'=>$id));
    }
    public function putReturn(Request $request,$id){
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->rented=false;
        $pelicula->save();
        notify()->success('Película Devuelta con Exito!!');
        //notify()->emotify('success', '¡Pelicula Agregada!');
        return redirect()->action([CatalogController::class,'getShow'],array('id'=>$id));
    }
    public function deleteMovie(Request $request,$id){
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->delete();
        notify()->warning('Eliminaste una Película del catalogo!');;
        return redirect('catalog');
    }

}
