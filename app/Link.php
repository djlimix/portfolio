<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title', 'url', 'for'];

    public function clicks() {
        return $this->hasMany(LinkClick::class);
    }
}
