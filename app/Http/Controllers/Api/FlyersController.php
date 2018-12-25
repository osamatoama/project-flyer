<?php

namespace App\Http\Controllers\Api;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhotoResource;

class FlyersController extends Controller
{
    /**
     * get the photos associated with the Flyer
     * @param  Flyer  $flyer
     * @return Collection
     */
    public function getPhotos(Flyer $flyer)
    {
        return  PhotoResource::collection($flyer->photos);
    }

    /**
     * delete a photo
     * @param  Photo  $photo
     * @return void
     */
    public function deletePhoto(Photo $photo)
    {
        $photo->delete();
    }
}
