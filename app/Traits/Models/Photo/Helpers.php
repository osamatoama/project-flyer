<?php
namespace App\Traits\Models\Photo;

use File;

trait Helpers
{
    /**
     * overwrite the original delete method to delete the photo's file
     * @return void
     */
    public function delete()
    {

        File::delete(
            // retrieve the image path belongs to the folders not the URL
            flyer_photo_path($this->getPhotoName(), false)
        );
        // call the original method of the Eloquent
        parent::delete();
    }

    /**
     * url to delete the photo
     *
     * @return string
     */
    public
        function deletePath()
    {
        return route('flyers.delete_photo', [$this]);
    }
}
