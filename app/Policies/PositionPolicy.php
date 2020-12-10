<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Position;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the position can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list positions');
    }

    /**
     * Determine whether the position can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Position  $model
     * @return mixed
     */
    public function view(User $user, Position $model)
    {
        return $user->hasPermissionTo('view positions');
    }

    /**
     * Determine whether the position can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create positions');
    }

    /**
     * Determine whether the position can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Position  $model
     * @return mixed
     */
    public function update(User $user, Position $model)
    {
        return $user->hasPermissionTo('update positions');
    }

    /**
     * Determine whether the position can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Position  $model
     * @return mixed
     */
    public function delete(User $user, Position $model)
    {
        return $user->hasPermissionTo('delete positions');
    }

    /**
     * Determine whether the position can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Position  $model
     * @return mixed
     */
    public function restore(User $user, Position $model)
    {
        return false;
    }

    /**
     * Determine whether the position can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Position  $model
     * @return mixed
     */
    public function forceDelete(User $user, Position $model)
    {
        return false;
    }
}
