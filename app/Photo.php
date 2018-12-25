<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'flyer_photos';
    protected $fillable = ['path'];
    /**
     * flyer relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
        $this->belongsTo(App\Flyer::class);
    }

    /**
     * get the Photo's path
     * @param  string $path
     * @return string
     */
    public function getPathAttribute($path)
    {
        return flyer_photo_path($path);
    }

    /**
     * overwrite the original delete method to delete the photo's file
     * @return void
     */
    public function delete()
    {
        parent::delete();
        $path = explode('/', $this->path);
        \File::delete(storage_path('app/public/flyers/' . end($path)));
    }
}
