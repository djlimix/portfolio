<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function timetable() {
        return $this->hasMany(Timetable::class);
    }
}
