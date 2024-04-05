<?php

namespace App\Policies;

use App\Models\Fichaje;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FichajePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
       return $user->role === "Admin";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Fichaje $fichaje): bool
    {
        // Permitir ver solo si el usuario es el propietario del fichaje
            return $user->id === $fichaje->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'Admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Fichaje $fichaje): bool
    {
        return $user->role === 'Admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Fichaje $fichaje): bool
    {
        return $user->role === 'Admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Fichaje $fichaje): bool
    {
        return $user->role === 'Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Fichaje $fichaje): bool
    {
        return $user->role === 'Admin';
    }
}