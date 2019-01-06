<?php
namespace App\Traits\Models\Photo;

trait Getters
{
    /**
     * get the Photo's path
     * @param  string $path
     * @return string
     */
    public function getPathAttribute($path)
    {
        return flyer_photo_path($path);
    }

    public function getPhotoName()
    {
        $path = explode('/', $this->path);
        return end($path);
    }
}
