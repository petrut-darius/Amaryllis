<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(["name", "description"])]
class Baptism extends Model
{
    public function images() {
        return $this->morphMany(EventImage::class,"imageable");
    }
}
