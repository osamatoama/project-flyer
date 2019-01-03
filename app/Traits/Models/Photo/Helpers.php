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

        $path = explode('/', $this->path);
        $path  = end($path);

        File::delete(
            // retrieve the image path belongs to the folders not the URL
            flyer_photo_path($path, false)
        );
        // call the original method of the Eloquentf
        parent::delete();
    }
}
