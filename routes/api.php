<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('api/user', function () {
    // Zona de acceso restringido
})->middleware('auth.basic.once');

Route::get('profile', function () {
    // Zona de acceso restringido
})->middleware('auth.basic');

Route::get('/api/v1/catalog', 'APICatalogController@getindex');

//Route::get('/api/v1/catalog', [App\Http\Controllers\APICatalogController::class, 'index'])->name('inicio');
