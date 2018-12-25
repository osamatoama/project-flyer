<?php

namespace App;

use App\Photo;
use App\Traits\Models\Flyer\Scopes;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    use Scopes;

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

    /**
     * Flyer Photos relationship(1 to many)
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    /**
     * get the URL to single flyer
     * @return string
     */
    public function url()
    {
        $street = str_replace(' ', '-', $this->street);
        return route('flyers.show', [$this->zip, $street]);
    }

    /**
     * determine if the flyer owned by the current auth user (to be used in Vue)
     * @return boolean
     */
    public function ownedByAuthUser()
    {
        $user = auth()->user();
        return  $user && $user->can('delete', $this) ? 'can' : 'cannot';
    }
}
