<?php
namespace App\Traits\Models\Photo;

use App\Flyer;

trait Relations
{
    /**
     * flyer relationship (Many to 1)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
        return $this->belongsTo(Flyer::class);
    }
}
