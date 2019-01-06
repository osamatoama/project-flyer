<?php

namespace App;

use App\Traits\Models\Flyer\Scopes;
use App\Traits\Models\Flyer\Getters;
use App\Traits\Models\Flyer\Helpers;
use App\Traits\Models\Flyer\Relations;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    use Scopes, Getters, Relations, Helpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state', 'street', 'zip', 'city', 'country', 'price', 'description'
    ];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        //
    ];
}
