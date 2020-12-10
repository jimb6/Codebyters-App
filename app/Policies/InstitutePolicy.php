<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Institute;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstitutePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the institute can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list institutes');
    }

    /**
     * Determine whether the institute can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Institute  $model
     * @return mixed
     */
    public function view(User $user, Institute $model)
    {
        return $user->hasPermissionTo('view institutes');
    }

    /**
     * Determine whether the institute can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create institutes');
    }

    /**
     * Determine whether the institute can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Institute  $model
     * @return mixed
     */
    public function update(User $user, Institute $model)
    {
        return $user->hasPermissionTo('update institutes');
    }

    /**
     * Determine whether the institute can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Institute  $model
     * @return mixed
     */
    public function delete(User $user, Institute $model)
    {
        return $user->hasPermissionTo('delete institutes');
    }

    /**
     * Determine whether the institute can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Institute  $model
     * @return mixed
     */
    public function restore(User $user, Institute $model)
    {
        return false;
    }

    /**
     * Determine whether the institute can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Institute  $model
     * @return mixed
     */
    public function forceDelete(User $user, Institute $model)
    {
        return false;
    }
}
