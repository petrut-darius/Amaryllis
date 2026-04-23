<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    public $fillable = [
        "path",
    ];

    public function imageable() {
        return $this->morphTo();
    }
}
