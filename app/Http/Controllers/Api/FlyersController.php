<?php

namespace App\Http\Controllers\Api;

use App\Flyer;
use App\Photo;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhotoResource;
use App\Events\Flyers\PhotoWasAddedToFlyer;

class FlyersController extends Controller
{
    /**
     * get the photos associated with the Flyer
     * @param  Flyer  $flyer
     * @return Illuminate\Support\Collection
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
        $this->authorize('deletePhoto', $photo->flyer);
        $photo->delete();
    }

    /**
     * add photo to a flyer
     * @param Flyer $flyer
     * @fire PhotoWasAddedToFlyer
     * @return void
     */
    public function addPhoto(Flyer $flyer)
    {
        // validation
        $this->validate(request(), [
            'photo' => 'required|mimes:jpg,png,jpeg,gif,JPG'
        ]);
        // authorization
        $this->authorize('addPhoto', $flyer);
        // check for maximum photos for each flyer
        if ($this->checkForMaximumPhotosForEachFlyer($flyer)) {
            return response()->json('too over images for each flyer', 406);
        }

        $file =  request()->file('photo');

        $file->move(
            config('flyer.photos_path'),
            $path = random_image_path($file)
        );


        PhotoWasAddedToFlyer::dispatch(
            // return the already crated photo instance and pass to the event constructor
            $flyer->createAndAttachPhoto($path)
        );
    }


    /**
     * check if the photos for each flyer exceed the limit
     * @param  Flyer  $flyer
     * @return boolean
     */
    private function checkForMaximumPhotosForEachFlyer(Flyer $flyer)
    {
        $maxImagesForEachFlyer = config('flyer.max_images_for_each_flyer');
        $count  = $flyer->photos()->count();
        return $count >=  $maxImagesForEachFlyer ;
    }
}
