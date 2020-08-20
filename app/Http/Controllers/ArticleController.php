<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function getArticles() {
        $articles = Cache::rememberForever('homepage', function () {
            $featured = Article::select('slug', 'title', 'bg', 'created_at')->whereActive('1')->latest()->first();
            $otherArticles = Article::select('slug', 'title', 'thumb as bg', 'created_at')->whereActive('1')->orderBy('created_at', 'DESC')->skip(1)->take(4)->get();
            return json_encode(['featured' => $featured, 'other' => $otherArticles]);
        });

        return $articles;
    }

    public function getArticle( $slug ) {
        $article = Cache::rememberForever('article.' . $slug, function () use ($slug) {
            return Article::whereSlug($slug)->whereActive('1')->with('tags')->firstOrFail();
        });

        if (!isset($_COOKIE['seen.' . $slug])) {
            $article->views++;

            $article->save();
            setcookie('seen.' . $slug, '1', strtotime('+1 YEAR'), '/');
        }

        return $article->toJson();
    }
}
