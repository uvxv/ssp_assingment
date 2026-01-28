<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($user, Product $product): bool
    {
        return $product->admin_id == $user->admin_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user instanceof Admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Product $product): bool
    {
        return $user instanceof Admin && $user->admin_id == $product->admin_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Product $product): bool
    {
        return $user instanceof Admin && $user->admin_id == $product->admin_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore($user, Product $product): bool
    {
        return $user instanceof Admin && $user->admin_id == $product->admin_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete($user, Product $product): bool
    {
        return $user instanceof Admin && $user->admin_id == $product->admin_id;
    }
}
