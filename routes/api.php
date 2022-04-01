<?php

use App\Http\Controllers\API\APICatalogController;
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

Route::get('/v1/catalog', 'API\APICatalogController@index');

Route::get('/v1/catalog/{id}', 'API\APICatalogController@show');

Route::post('/v1/catalog', 'API\APICatalogController@store')->middleware('auth.basic');

Route::put('/v1/catalog/{id}', 'API\APICatalogController@update')->middleware('auth.basic');

Route::delete('/v1/catalog/{id}', 'API\APICatalogController@destroy')->middleware('auth.basic');

Route::put('/v1/catalog/{id}/rent', 'API\APICatalogController@putRent')->middleware('auth.basic');

Route::put('/v1/catalog/{id}/return', 'API\APICatalogController@putReturn')->middleware('auth.basic');


