<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LetsDance extends Model
{
    protected $fillable = [
        'number',
        'guest',
        'soundcloud',
        'apple_podcasts',
    ];
}
