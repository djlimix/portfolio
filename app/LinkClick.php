<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkClick extends Model
{
    protected $fillable = ['ip', 'referrer'];
}
