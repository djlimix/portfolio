<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ArticleController extends Controller {
    public function index() {
        $articles = Article::all();

        return view('admin.articles.show', compact('articles'));
    }

    public function add() {
        return view('admin.articles.add');
    }

    public function store(StoreArticleRequest $request) {
        $data = $request->validated();
        $bg   = uploadBg($request);

        $article = new Article();

        $article->slug  = Str::slug($data['title']);
        $article->title = $data['title'];
        $article->text  = b64toUrl($data['text']);
        $article->bg    = $bg['bg'];
        $article->thumb = $bg['thumb'];

        $article->save();

        return redirect()->route('admin.articles.edit', $article);
    }

    public function edit(Article $article) {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Article $article, UpdateArticleRequest $request) {
        $data           = $request->validated();
        $article->slug  = Str::slug($data['title']);
        $article->title = $data['title'];
        $article->text  = b64toUrl(checkForCode($data['text']));

        if ($article->active == '0' && $data['published'] == '1') {
            $article->created_at = Carbon::today()->toDateTimeString();
        }

        $article->active = $data['published'] == '1' ? '1' : '0';

        if (!empty($data['bg'])) {
            $bg             = uploadBg($request);
            $article->bg    = $bg['bg'];
            $article->thumb = $bg['thumb'];
        }

        $article->save();

        return redirect()->route('admin.articles.edit', $article->id);
    }

    public function delete(Article $article) {
        $article->delete();

        return redirect()->route('admin.articles');
    }
}
