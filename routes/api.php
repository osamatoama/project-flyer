<?php




Route::get('flyer/photos/{flyer}', 'Api\FlyerPhotosController@index');


Route::group(['namespace' => 'Api','middleware' => 'auth:api'], function () {

    Route::post('flyers/{flyer}/photos', 'FlyerPhotosController@store')->name('flyers.add_photo');
    Route::delete('flyer/photos/{photo}/delete', 'FlyerPhotosController@destroy');
});
