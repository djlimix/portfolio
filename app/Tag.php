<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title', 'slug'];

    public function articles() {
        return $this->belongsToMany('App\Article', 'article_tag')->orderByDesc('created_at');
    }
}
