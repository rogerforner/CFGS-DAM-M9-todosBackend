<?php

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

/**
 * Ruta de la vista welcome
 * resources/views/welcome.blade
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Les següents rutes estàn protegides. És a dir, si no estàs logat i hi intentes accedir
 * et redirigeixen a la pàgina de login.
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     * Ruta de la vista tasks
     * Http/Controllers/TaskController -> index()
     */
    Route::resource('/tasks', 'TaskController');

    /**
     * Ruta de la vista emails
     * Http/Controllers/EmailController -> index()
     */
    Route::resource('/emails', 'EmailController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
