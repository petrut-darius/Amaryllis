<?php

namespace App\Policies;

use App\Models\Arrangement;
use App\Models\User;
use App\Enums\UserPermissions;

class ArrangementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BOUQUETS->value, UserPermissions::CREATE_BOUQUETS->value, UserPermissions::UPDATE_BOUQUETS->value, UserPermissions::DELETE_BOUQUETS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Arrangement $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BOUQUETS->value, UserPermissions::CREATE_BOUQUETS->value, UserPermissions::UPDATE_BOUQUETS->value, UserPermissions::DELETE_BOUQUETS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BOUQUETS->value, UserPermissions::CREATE_BOUQUETS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Arrangement $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BOUQUETS->value, UserPermissions::UPDATE_BOUQUETS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Arrangement $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BOUQUETS->value, UserPermissions::DELETE_BOUQUETS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Arrangement $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Arrangement $model): bool
    {
        return false;
    }
}
