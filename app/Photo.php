<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $table = 'flyer_photos';
	protected $fillable = ['photo'];
    /**
     * flyer relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer() {
        $this->belongsTo(App\Flyer::class);
    }
}
