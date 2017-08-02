<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDescription extends Model
{
    protected $visible = ['description'];

    protected $fillable = [
        'description', 'user_id',
    ];
}
