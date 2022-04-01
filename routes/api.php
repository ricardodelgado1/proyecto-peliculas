<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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

Route::get('/v1/catalog', 'API\APICatalogController@index');
Route::get('/v1/catalog/{id}', 'APICatalogController@show');
Route::post('/v1/catalog', 'APICatalogController@store')->middleware('auth.basic');
Route::put('/v1/catalog/{id}', 'APICatalogController@update')->middleware('auth.basic');
Route::delete('/v1/catalog/{id}', 'APICatalogController@destroy')->middleware('auth.basic');
Route::put('/v1/catalog/rent/{id}', 'APICatalogController@putRent')->middleware('auth.basic');;
Route::put('/v1/catalog/return/{id}', 'APICatalogController@putReturn')->middleware('auth.basic');

// Route::controller(App\Http\Controllers\APICatalogController::class)->group(function(){
//     Route::post('/v1/catalog', 'store');
//     Route::put('/v1/catalog/{id}', 'update');
// });

