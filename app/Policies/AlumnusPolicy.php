<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Alumnus;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlumnusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the alumnus can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list alumni');
    }

    /**
     * Determine whether the alumnus can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Alumnus  $model
     * @return mixed
     */
    public function view(User $user, Alumnus $model)
    {
        return $user->hasPermissionTo('view alumni');
    }

    /**
     * Determine whether the alumnus can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create alumni');
    }

    /**
     * Determine whether the alumnus can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Alumnus  $model
     * @return mixed
     */
    public function update(User $user, Alumnus $model)
    {
        return $user->hasPermissionTo('update alumni');
    }

    /**
     * Determine whether the alumnus can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Alumnus  $model
     * @return mixed
     */
    public function delete(User $user, Alumnus $model)
    {
        return $user->hasPermissionTo('delete alumni');
    }

    /**
     * Determine whether the alumnus can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Alumnus  $model
     * @return mixed
     */
    public function restore(User $user, Alumnus $model)
    {
        return false;
    }

    /**
     * Determine whether the alumnus can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Alumnus  $model
     * @return mixed
     */
    public function forceDelete(User $user, Alumnus $model)
    {
        return false;
    }
}
