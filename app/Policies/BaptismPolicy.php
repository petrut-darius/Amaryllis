<?php

namespace App\Policies;

use App\Models\Baptism;
use App\Models\User;
use App\Enums\UserPermissions;

class BaptismPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BAPTISMS->value, UserPermissions::CREATE_BAPTISMS->value, UserPermissions::UPDATE_BAPTISMS->value, UserPermissions::DELETE_BAPTISMS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Baptism $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BAPTISMS->value, UserPermissions::CREATE_BAPTISMS->value, UserPermissions::UPDATE_BAPTISMS->value, UserPermissions::DELETE_BAPTISMS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BAPTISMS->value, UserPermissions::CREATE_BAPTISMS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Baptism $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BAPTISMS->value, UserPermissions::UPDATE_BAPTISMS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Baptism $model): bool
    {
        if($user->super_admin === true) return true;

        if($user->hasAnyPermission([UserPermissions::MANAGE_BAPTISMS->value, UserPermissions::DELETE_BAPTISMS->value])) return true;

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Baptism $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Baptism $model): bool
    {
        return false;
    }
}
