<?php

// Lesson: 15


Route::get('/', 'FlyersController@index');

Route::resource('flyers', 'FlyersController', ['except' => 'show']);



Route::get('flyers/{zip}/{street}', 'FlyersController@show')->name('flyers.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');















Route::get('logt', function () {
    \Auth::logout();
    return redirect('/');
});

Route::get('logn', function () {
    \Auth::login(App\User::first());
    return redirect('/');
});
