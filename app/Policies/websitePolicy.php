<?php

namespace App\Policies;

use App\Models\User;
use App\Models\website;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class websitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\website  $website
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, website $website)
    {
        return $user->id === $website->user_id 
        ? Response::allow()
        : Response::deny('you dont have permission to edit website');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\website  $website
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, website $website)
    {
        return $user->id === $website->user_id 
        ? Response::allow()
        : Response::deny('you dont have permission to edit website');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\website  $website
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, website $website)
    {
        if ($user->id === $website->user_id) { 
            return Response::allow();
        }else{
            return Response::deny('you dont have permission to delete website');
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\website  $website
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, website $website)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\website  $website
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, website $website)
    {
        //
    }
}
