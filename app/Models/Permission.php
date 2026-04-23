<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(["slug", "description"])]
class Permission extends Model
{
    public function users() {
        return $this->belongsToMany(User::class, "user_permission");
    }
}
