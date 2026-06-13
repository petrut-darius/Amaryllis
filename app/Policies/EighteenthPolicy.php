<?php

namespace App\Policies;

use App\Enums\UserPermissions;
use App\Models\Eighteenth;
use App\Models\User;

class EighteenthPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EIGHTEENTHS->value, UserPermissions::CREATE_EIGHTEENTHS->value, UserPermissions::UPDATE_EIGHTEENTHS->value, UserPermissions::DELETE_EIGHTEENTHS->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Eighteenth $model): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EIGHTEENTHS->value, UserPermissions::CREATE_EIGHTEENTHS->value, UserPermissions::UPDATE_EIGHTEENTHS->value, UserPermissions::DELETE_EIGHTEENTHS->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EIGHTEENTHS->value, UserPermissions::CREATE_EIGHTEENTHS->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Eighteenth $model): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EIGHTEENTHS->value, UserPermissions::UPDATE_EIGHTEENTHS->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Eighteenth $model): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EIGHTEENTHS->value, UserPermissions::DELETE_EIGHTEENTHS->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Eighteenth $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Eighteenth $model): bool
    {
        return false;
    }
}
