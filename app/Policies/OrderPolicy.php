<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class OrderPolicy
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
    public function view($user, Order $order): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user instanceof User && $order->user_id === $user->id &&
                $user->tokenCan('read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user instanceof Admin || ($user instanceof User && $user->tokenCan('create'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Order $order): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Order $order): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore($user, Order $order): bool
    {
        return $user instanceof Admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete($user, Order $order): bool
    {
        return $user instanceof Admin;
    }
}
