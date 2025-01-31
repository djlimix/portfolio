<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller {
    public function getArticles() {
        return Cache::rememberForever('homepage', function() {
            return Article::select('slug', 'title', 'thumb', 'created_at', 'text')->whereActive('1')->latest('id')->take(8)->get();
        });
    }

    public function getArticle($slug) {
        $article = Cache::rememberForever('article.'.$slug, function() use ($slug) {
            return Article::whereSlug($slug)->whereActive('1')->firstOrFail();
        });

        if (!isset($_COOKIE['seen.'.$slug])) {
            $article->views++;

            $article->save();
            setcookie('seen.'.$slug, '1', strtotime('+1 YEAR'), '/');
        }

        return $article;
    }
}
