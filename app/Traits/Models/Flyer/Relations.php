<?php

namespace App\Traits\Models\Flyer;

use App\User;
use App\Photo;

trait Relations
{
    /**
     * Flyer Photos relationship(1 to Many)
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    /**
     * Flyer Users relationship(Many to 1)
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
