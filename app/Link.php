<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Link extends Model {
    protected $fillable = ['title', 'url', 'for'];

    public function clicks() {
        return $this->hasMany(LinkClick::class);
    }

    public function published(): Attribute {
        return Attribute::make(get: function($value, $data) {
            return Carbon::parse($data['created_at'])->diffForHumans();
        });
    }
}
