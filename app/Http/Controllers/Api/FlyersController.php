<?php

namespace App\Http\Controllers\Api;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhotoResource;

class FlyersController extends Controller
{

    public function getPhotos(Flyer $flyer)
    {
        return  PhotoResource::collection($flyer->photos);
    }

    public function deletePhoto(Photo $photo)
    {
        $photo->delete();
        //return;
    }
}
