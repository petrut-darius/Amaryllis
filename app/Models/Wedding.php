<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'description', 'images'])]
class Wedding extends Model
{
    protected $casts = [
        'images' => 'array',
    ];
}
