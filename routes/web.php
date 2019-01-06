<?php

Route::get('/', 'FlyersController@index');


Route::resource('flyers', 'FlyersController', ['except' => 'show']);



Route::get('flyers/{zip}/{street}', 'FlyersController@show')->name('flyers.show');

Auth::routes();















Route::get('logt', function () {
    \Auth::logout();
    return redirect('/');
});

Route::get('logn/{id?}', function ($id = 1) {
    $user = App\User::find($id);
    if (!$user) {
        $user = create(App\User::class);
    }

    \Auth::login($user);
    return redirect('/');
});
