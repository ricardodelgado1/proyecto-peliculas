<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'CatalogController@getindex');

Route::get('catalog', 'CatalogController@getIndex');

Route::get('catalog/show/{id}', 'CatalogController@getShow');

Route::get('catalog/create', 'CatalogController@getCreate');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('catalog/create', 'CatalogController@postCreate')->middleware('auth');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit');

Route::put('catalog/rent/{id}',[CatalogController::class, 'putRent']);
Route::put('catalog/return/{id}',[CatalogController::class, 'putReturn']);

Route::delete('catalog/delete/{id}',[CatalogController::class,'deleteMovie']);



/*
Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('catalog', function () {
    return view('catalog.index');
});

Route::get('catalog/show/{id}', function ($id) {
    return view('catalog.show', array('id'=>$id));
});

Route::get('catalog/create', function () {
    return view('catalog.create');
});

Route::get('catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id'=>$id));
});

Route::post('logout', function () {
    return "Saliendo de la sesión";
}); */


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
