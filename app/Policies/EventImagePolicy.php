<?php

namespace App\Policies;

use App\Enums\UserPermissions;
use App\Models\EventImage;
use App\Models\User;

class EventImagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EVENT_IMAGES->value, UserPermissions::CREATE_EVENT_IMAGES->value, UserPermissions::UPDATE_EVENT_IMAGES->value, UserPermissions::DELETE_EVENT_IMAGES->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventImage $model): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EVENT_IMAGES->value, UserPermissions::CREATE_EVENT_IMAGES->value, UserPermissions::UPDATE_EVENT_IMAGES->value, UserPermissions::DELETE_EVENT_IMAGES->value])) {
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

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EVENT_IMAGES->value, UserPermissions::CREATE_EVENT_IMAGES->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventImage $model): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EVENT_IMAGES->value, UserPermissions::UPDATE_EVENT_IMAGES->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventImage $model): bool
    {
        if ($user->super_admin === true) {
            return true;
        }

        if ($user->hasAnyPermission([UserPermissions::MANAGE_EVENT_IMAGES->value, UserPermissions::DELETE_EVENT_IMAGES->value])) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EventImage $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EventImage $model): bool
    {
        return false;
    }
}
