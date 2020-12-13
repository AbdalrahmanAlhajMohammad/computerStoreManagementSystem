<?php

namespace App\Policies;

use App\User;
use App\Manufactory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManufactoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the manufactory.
     *
     * @param  \App\User  $user
     * @param  \App\Manufactory  $manufactory
     * @return mixed
     */
    public function view(User $user, Manufactory $manufactory)
    {
        if ($user->links()->where('route','manufactories.show')->first())
            return true;
    }

    /**
     * Determine whether the user can create manufactories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->links()->where('route','manufactories.create')->first())
            return true;
    }

    /**
     * Determine whether the user can update the manufactory.
     *
     * @param  \App\User  $user
     * @param  \App\Manufactory  $manufactory
     * @return mixed
     */
    public function update(User $user, Manufactory $manufactory)
    {
        if ($user->links()->where('route','manufactories.edit')->first())
            return true;
    }

    /**
     * Determine whether the user can delete the manufactory.
     *
     * @param  \App\User  $user
     * @param  \App\Manufactory  $manufactory
     * @return mixed
     */
    public function delete(User $user, Manufactory $manufactory)
    {
        if ($user->links()->where('route','manufactories.delete')->first())
            return true;
    }

    /**
     * Determine whether the user can restore the manufactory.
     *
     * @param  \App\User  $user
     * @param  \App\Manufactory  $manufactory
     * @return mixed
     */
    public function restore(User $user, Manufactory $manufactory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the manufactory.
     *
     * @param  \App\User  $user
     * @param  \App\Manufactory  $manufactory
     * @return mixed
     */
    public function forceDelete(User $user, Manufactory $manufactory)
    {
        //
    }
}
