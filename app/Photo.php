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

    public function getPathAttribute($path)
    {
        return flyer_photo_path($path);
    }
    public function delete()
    {
        parent::delete();
        $path = explode('/', $this->path);
        \File::delete(storage_path('app/public/flyers/' . end($path)));
    }
}
