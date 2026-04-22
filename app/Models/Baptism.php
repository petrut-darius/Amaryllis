<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baptism extends Model
{
    protected $fillable = [
        "name",
        "description"
    ];

    public function images() {
        return $this->morphMany(EventImage::class,"imageable");
    }
}
