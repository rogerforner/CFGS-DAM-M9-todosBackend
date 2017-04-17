<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    /**
     * Ruta per fer referència al controlador TaskController.
     *
     * Podríem afegir totes les rutes que empraríem per treballar amb la creació, edició, eliminació de les
     * tasques. Però és més net crear un controlador específic per a aquestes, doncs en aquest fitxer
     * és provable es vagi incrementant el número de controladors a emprar, no només per a tasques.
     */
    Route::resource('task', 'TaskController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});
