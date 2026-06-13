<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'description', 'images'])]
class Baptism extends Model
{
    protected $casts = [
        'images' => 'array',
    ];
}
