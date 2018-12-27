<?php

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * helpers file
 * @author Osama Toma <osamahassan333333@hotmail.com>
 */


/**
 * return the path to javascript file
 * @param  string $path
 * @return string
 */
function js($path)
{
    return asset("public/js/{$path}");
}


/**
 * return the path to css  file
 * @param  string $path
 * @return string
 */
function css($path)
{
    return asset("public/css/{$path}");
}

/**
 * store a flash message into the session
 * @param  string|null $title
 * @param  string|null $message
 * @return mixed
 */
function flash($title = null, $message = null)
{
    // resolve a helper Http class into the service container
    $flash = app('App\Http\Helpers\Flash');
    if (func_num_args() == 0) {
        return $flash; // e.g: flash()->error('title', 'body')
    }
    return $flash->message($title, $message);
}

/**
 * link to flyer photos path
 * @param  string $path
 * @return string
 */
function flyer_photo_path($path)
{
    return url("public/storage/flyers/{$path}");
}

/**
 * create random image path
 * @param  UploadedFile $file
 * @return string
 */
function random_image_path(UploadedFile $file)
{
    return  md5(rand(1, 999999)) . str_random() . '.' . $file->getClientOriginalExtension();
}
