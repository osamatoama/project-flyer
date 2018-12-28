<?php




Route::get('flyer/photos/{flyer}', 'Api\FlyersController@getPhotos');


Route::group(['namespace' => 'Api','middleware' => 'auth:api'], function () {

    Route::post('flyers/{flyer}/photos', 'FlyersController@addPhoto')->name('flyers.add_photo');
    Route::delete('flyer/photos/{photo}/delete', 'FlyersController@deletePhoto');
});
