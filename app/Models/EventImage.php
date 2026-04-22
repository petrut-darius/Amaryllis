<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    public function imageable() {
        return $this->morphTo();
    }
}
