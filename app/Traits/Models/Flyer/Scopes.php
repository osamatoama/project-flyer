<?php

namespace App\Traits\Models\Flyer;

trait Scopes
{

    /**
     * Local scope to fetch the flyer based on zip and street
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  string $zip
     * @param  string $street
     * @return \Illuminate\Database\Eloquent\Builder
     *
     */
    public function scopeLocatedAt($query, $zip, $street)
    {
        $street = str_replace('-', ' ', $street);
        return $query->where(compact('zip', 'street'));
    }
}
