<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacant;
use Illuminate\Auth\Access\Response;

class VacantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->role === 2 // 1 = developer, 2 = reclutador
            ? Response::allow()
            : Response::deny('Usted no es un reclutador.');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vacant $vacant): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->role === 2 // 1 = developer, 2 = reclutador
            ? Response::allow()
            : Response::deny('Usted no es un reclutador.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacant $vacant): Response
    {
        return $user->id === $vacant->user_id
            ? Response::allow()
            : Response::deny('Usted no es dueño de esta vacante.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacant $vacant): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacant $vacant): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacant $vacant): bool
    {
        //
    }
}
