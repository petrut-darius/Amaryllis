<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Enums\UserPermissions;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_PERMISSIONS->value, UserPermissions::CREATE_PERMISSIONS->value, UserPermissions::UPDATE_PERMISSIONS->value, UserPermissions::DELETE_PERMISSIONS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permission $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_PERMISSIONS->value, UserPermissions::CREATE_PERMISSIONS->value, UserPermissions::UPDATE_PERMISSIONS->value, UserPermissions::DELETE_PERMISSIONS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_PERMISSIONS->value, UserPermissions::CREATE_PERMISSIONS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permission $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_PERMISSIONS->value, UserPermissions::UPDATE_PERMISSIONS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permission $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_PERMISSIONS->value, UserPermissions::DELETE_PERMISSIONS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permission $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permission $model): bool
    {
        return false;
    }
}
