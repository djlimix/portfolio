<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTagArticles( $slug ) {
        return Tag::whereSlug($slug)->with('articles')->firstOrFail();
    }
}
