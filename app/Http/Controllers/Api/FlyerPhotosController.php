<?php

namespace App\Http\Controllers\Api;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhotoResource;

class FlyerPhotosController extends Controller
{
    /**
     * get the photos associated with the Flyer
     * @param  Flyer  $flyer
     * @return Illuminate\Support\Collection
     */
    public function index(Flyer $flyer)
    {
        return PhotoResource::collection($flyer->photos);
    }



    /**
     * add photo to a flyer
     * @param Flyer $flyer
     * @fire App\Events\PhotoWasAddedToFlyer
     * @return void
     */
    public function store(Flyer $flyer)
    {
        $this->authorize('addPhoto', $flyer);

        $this->validate(request(), [
            'photo' => 'required|mimes:jpg,png,jpeg,gif,JPG'
        ]);


        if ($this->checkForMaximumPhotosForEachFlyer($flyer)) {
            return response()->json('too over images for each flyer', 406);
        }

        $file = request()->file('photo');

        $file->move(
            config('flyer.photos_path'),
            $path = random_image_path($file)
        );
        return response()->json(
            $flyer->createAndAttachPhoto($path),
            201
        );
    }

    /**
     * delete a photo
     * @param  Photo  $photo
     * @return void
     */
    public function destroy(Photo $photo)
    {
        $this->authorize('deletePhoto', $photo->flyer);

        $photo->delete();
    }



    /**
     * check if the photos for each flyer exceed the limit
     * @param  Flyer  $flyer
     * @return boolean
     */
    private function checkForMaximumPhotosForEachFlyer(Flyer $flyer)
    {
        $maxImagesForEachFlyer = config('flyer.max_images_for_each_flyer');
        $count = $flyer->photos()->count();
        return $count >= $maxImagesForEachFlyer;
    }
}
