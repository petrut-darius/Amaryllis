<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(["name", "description", "color", "occasion", "images"])]
class FuneralArrangement extends Model
{
    protected $casts = [
        "images" => "array",
    ];
}
