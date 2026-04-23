<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', "super_admin", 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'super_admin' => "boolean"
        ];
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, "user_permission");
    }

    public function hasAnyPermission(array $permissions): bool {
        $enumPermissions = array_map(function($permission) {
            strtolower($permission instanceof \BackedEnum ? $permission->value : $permission);
        }, $permissions);


        return !empty($this->permissions()->whereIn("slug", $enumPermissions)->get());
    }
}
