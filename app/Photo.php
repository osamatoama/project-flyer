<?php

namespace App;

use App\Traits\Models\Photo\Getters;
use App\Traits\Models\Photo\Helpers;
use App\Traits\Models\Photo\Relations;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use Relations, Getters, Helpers;
    /**
     * table name
     * @var string
     */
    protected $table = 'flyer_photos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path'];
}
