<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user): bool
    {
        return $user instanceof Admin;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($user, User $model): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user instanceof User && $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user instanceof Admin || $user instanceof User;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, User $model): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user instanceof User && $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, User $model): bool
    {
        return $user instanceof Admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore($user, User $model): bool
    {
        return $user instanceof Admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete($user, User $model): bool
    {
        return $user instanceof Admin;
    }
}
