<?php

namespace App;

use App\Photo;
use App\Traits\Models\Flyer\Scopes;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    use Scopes;
    protected $fillable = [
        'state', 'street', 'zip', 'city', 'country', 'price', 'description'
    ];

    protected $dispatchesEvents = [
        //
    ];
    /**
     * Photos relationship(1 to many)
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
