<?php

// Lesson: 9

Route::view('/', 'welcome', ['title' => 'project flyer']);

Route::resource('flyers', 'FlyersControlller', ['except' => 'show']);


Route::get('flyers/{zip}/{street}', 'FlyersControlller@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');















Route::get('logt', function () {
    \Auth::logout();
    return redirect('/');
});

Route::get('logn', function () {
    \Auth::login(App\User::where('email', 'o@o.com')->first());
    return redirect('/');
});
