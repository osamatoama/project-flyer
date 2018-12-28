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
        return $user->owns($flyer);
    }

    /**
     * Determine whether the user can add a photo  the flyer.
     *
     * @param  \App\User  $user
     * @param  \App\Flyer  $flyer
     * @return mixed
     */
    public function addPhoto(User $user, Flyer $flyer)
    {
        return $user->owns($flyer);
    }

    /**
     * Determine whether the user can delete a photo  from flyer.
     *
     * @param  \App\User  $user
     * @param  \App\Flyer  $flyer
     * @return mixed
     */
    public function deletePhoto(User $user, Flyer $flyer)
    {
        return $user->owns($flyer);
    }
}
