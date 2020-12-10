<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Occupation;
use Illuminate\Auth\Access\HandlesAuthorization;

class OccupationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the occupation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list occupations');
    }

    /**
     * Determine whether the occupation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Occupation  $model
     * @return mixed
     */
    public function view(User $user, Occupation $model)
    {
        return $user->hasPermissionTo('view occupations');
    }

    /**
     * Determine whether the occupation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create occupations');
    }

    /**
     * Determine whether the occupation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Occupation  $model
     * @return mixed
     */
    public function update(User $user, Occupation $model)
    {
        return $user->hasPermissionTo('update occupations');
    }

    /**
     * Determine whether the occupation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Occupation  $model
     * @return mixed
     */
    public function delete(User $user, Occupation $model)
    {
        return $user->hasPermissionTo('delete occupations');
    }

    /**
     * Determine whether the occupation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Occupation  $model
     * @return mixed
     */
    public function restore(User $user, Occupation $model)
    {
        return false;
    }

    /**
     * Determine whether the occupation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Occupation  $model
     * @return mixed
     */
    public function forceDelete(User $user, Occupation $model)
    {
        return false;
    }
}
