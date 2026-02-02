<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CartPolicy
{
    /**
     * Determine whether the user can view any models.
     */
        public function viewAny($user): bool
        {
            if ($user instanceof Admin) {
                return true;
            }

            return $user instanceof User;
        }


    /**
     * Determine whether the user can view the model.
     */
    public function view($user, Cart $cart): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user instanceof User && $cart->user_id === $user->id &&
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
    public function update($user, Cart $cart): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user instanceof User && $cart->user_id === $user->id &&
                $user->tokenCan('update');
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Cart $cart): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user instanceof User && $cart->user_id === $user->id &&
                $user->tokenCan('delete');
    }
  

    /**
     * Determine whether the user can restore the model.
     */
    public function restore($user, Cart $cart): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user instanceof User && $cart->user_id === $user->id &&
                $user->tokenCan('restore');
    }


    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete($user, Cart $cart): bool
    {
        return $user instanceof User && $cart->user_id === $user->id &&
                $user->tokenCan('delete');
    }

}
