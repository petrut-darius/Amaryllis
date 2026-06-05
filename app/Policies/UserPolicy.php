<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\UserPermissions;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_USERS->value, UserPermissions::CREATE_USERS->value, UserPermissions::UPDATE_USERS->value, UserPermissions::DELETE_USERS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_USERS->value, UserPermissions::CREATE_USERS->value, UserPermissions::UPDATE_USERS->value, UserPermissions::DELETE_USERS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_USERS->value, UserPermissions::CREATE_USERS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {

        if($user->super_admin === true) return true;

        if($user->id === $model->id) return false;

        if($user->hasAnyPermission([UserPermissions::MANAGE_USERS->value, UserPermissions::UPDATE_USERS->value]) && $model->super_admin === true) return false;

        if($user->hasAnyPermission([UserPermissions::MANAGE_USERS->value, UserPermissions::UPDATE_USERS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if($user->id === $model->id) return false;

        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_USERS->value, UserPermissions::DELETE_USERS->value]) && $model->super_admin === true) return false;

        if($user->hasAnyPermission([UserPermissions::MANAGE_USERS->value, UserPermissions::DELETE_USERS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
