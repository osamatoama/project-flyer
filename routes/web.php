<?php

// Lesson: 11

Route::view('/', 'welcome', ['title' => 'project flyer']);

Route::resource('flyers', 'FlyersControlller', ['except' => 'show']);


Route::name('flyers.show')->get('flyers/{zip}/{street}', 'FlyersControlller@show');
Route::post('flyers/{flyer}/photos', 'FlyersControlller@addPhoto')->name('flyers.add_photo');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');















Route::get('logt', function () {
    \Auth::logout();
    return redirect('/');
});

Route::get('logn/{id}', function ($id) {
    \Auth::loginUsingId($id);
    return redirect('/');
});
