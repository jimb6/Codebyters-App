<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Official;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the official can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list officials');
    }

    /**
     * Determine whether the official can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Official  $model
     * @return mixed
     */
    public function view(User $user, Official $model)
    {
        return $user->hasPermissionTo('view officials');
    }

    /**
     * Determine whether the official can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create officials');
    }

    /**
     * Determine whether the official can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Official  $model
     * @return mixed
     */
    public function update(User $user, Official $model)
    {
        return $user->hasPermissionTo('update officials');
    }

    /**
     * Determine whether the official can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Official  $model
     * @return mixed
     */
    public function delete(User $user, Official $model)
    {
        return $user->hasPermissionTo('delete officials');
    }

    /**
     * Determine whether the official can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Official  $model
     * @return mixed
     */
    public function restore(User $user, Official $model)
    {
        return false;
    }

    /**
     * Determine whether the official can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Official  $model
     * @return mixed
     */
    public function forceDelete(User $user, Official $model)
    {
        return false;
    }
}
