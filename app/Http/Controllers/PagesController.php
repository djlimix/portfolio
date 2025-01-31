<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    public function homepage()
    {
        $articles = Article::select('title', 'created_at', 'slug')->whereActive('1')->latest()->get();

        return view('index', compact('articles'));
    }

    public function writing($slug)
    {
        $article = Article::whereSlug($slug)->whereActive('1')->firstOrFail();

        $article->views++;

        $article->save();

        return view('writing', compact('article'));
    }

    public function yearmix2022(?string $redirect = '')
    {
        if (!empty($redirect)) {
            $url = match ($redirect) {
                'mixcloud' => 'https://www.mixcloud.com/dj-limix/yearmix-2022/',
                'gpodcasts' => 'https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy83OWY3OWMyNC9wb2RjYXN0L3Jzcw/episode/ZTk5YzUyNGYtNmNmNS00MGViLWFiMzMtMDAyNzBiOGM4ZGY2',
                'apodcasts' => 'https://podcasts.apple.com/sk/podcast/dj-limix-in-the-mix/id1601096775?i=1000591759358',
                'hypedit' => 'https://hypeddit.com/ka190j',
                'sc' => 'https://soundcloud.com/dj-limix/yearmix-2022?si=39329fbc1dc145afb7cc883234385804&utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing',
                default => ''
            };

            if (!empty($url)) {
                return redirect($url);
            }
        }

        return view('yearmix');
    }
}
