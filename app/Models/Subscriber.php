<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'token', 'subscribed_at', 'unsubscribed_at', 'terms_accepted_at'])]
class Subscriber extends Model
{
    //
}
