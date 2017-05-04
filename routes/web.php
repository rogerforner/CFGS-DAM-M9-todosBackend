<?php


use RogerForner\TodosBackend\Task;

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'can:show,RogerForner\TodosBackend\Task'], function () {
        Route::get('/tasks', function () {
            return view('tasks');
        });
    });

    Route::get('/profile/tokens', function () {
        return view('tokens');
    });

    Route::get('users', function () {
        dd(RogerForner\TodosBackend\User::paginate());
    });

    #adminlte_routes
    Route::get('messages', 'MessagesController@index')->name('messages');
    Route::post('messages', 'MessagesController@sendMessage');
    Route::get('user/messages', 'MessagesController@fetchMessages');

    Route::resource('/emails', 'EmailController');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});
