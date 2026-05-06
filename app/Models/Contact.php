<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'phone', 'subject', 'message', 'event_date', 'vision'])]
class Contact extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
