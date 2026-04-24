<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wedding;
use App\Enums\UserPermissions;

class WeddingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_WEDDINGS->value, UserPermissions::CREATE_WEDDINGS->value, UserPermissions::UPDATE_WEDDINGS->value, UserPermissions::DELETE_WEDDINGS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Wedding $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_WEDDINGS->value, UserPermissions::CREATE_WEDDINGS->value, UserPermissions::UPDATE_WEDDINGS->value, UserPermissions::DELETE_WEDDINGS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_WEDDINGS->value, UserPermissions::CREATE_WEDDINGS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Wedding $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_WEDDINGS->value, UserPermissions::UPDATE_WEDDINGS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_WEDDINGS->value, UserPermissions::DELETE_WEDDINGS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Wedding $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Wedding $model): bool
    {
        return false;
    }
}

