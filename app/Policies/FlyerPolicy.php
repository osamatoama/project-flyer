<?php

namespace App\Policies;

use App\User;
use App\Flyer;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlyerPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can update the flyer.
     *
     * @param  \App\User  $user
     * @param  \App\Flyer  $flyer
     * @return mixed
     */
    public function update(User $user, Flyer $flyer)
    {
        //
    }

    /**
     * Determine whether the user can delete the flyer.
     *
     * @param  \App\User  $user
     * @param  \App\Flyer  $flyer
     * @return mixed
     */
    public function delete(User $user, Flyer $flyer)
    {
        return $user->owned($flyer);
    }

    /**
     * Determine whether the user can add photo  the flyer.
     *
     * @param  \App\User  $user
     * @param  \App\Flyer  $flyer
     * @return mixed
     */
    public function addPhoto(User $user, Flyer $flyer)
    {
        return $user->owned($flyer);
    }
}
