<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $fillable = ['slug', 'title', 'description', 'type', 'link', 'year', 'end'];

    public function images() {
        return $this->hasMany(ProjectImage::class);
    }

    public function published(): Attribute {
        return Attribute::make(get: function($value, $data) {
            return Carbon::parse($data['created_at'])->diffForHumans();
        });
    }
}
