<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;
class Flyer extends Model
{

	protected $fillable = [
		'state', 'street', 'zip', 'city', 'country', 'price', 'description'
	];
    /**
     * Photos relationship(1 to many)
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
