<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Article extends Model
{
    public function tags() {
        return $this->belongsToMany('App\Tag')->orderByDesc('created_at');
    }

    public function getPublishedAttribute() {
        return date('d. m. Y, G:i:s', strtotime($this->created_at));
    }

    public function add( Request $request ) {
        $bg = uploadBg($request->bg);

        $article = new Article();

        $article->slug  = Str::slug($request->title);
        $article->title = $request->title;
        $article->text  = b64toUrl($request->text);
        $article->bg    = $bg['bg'];
        $article->thumb = $bg['thumb'];

        $article->save();

        foreach ( $request->tags as $tag ) {

            $tag_model = Tag::firstOrCreate(['title' => $tag, 'slug' => Str::slug($tag)]);

            $article->tags()->attach($tag_model->id);

        }

        Cache::delete('homepage');

        return redirect()->route('admin.articles.edit', $article->id);
    }

    public function edit( Article $article, Request $request ) {
        $article->tags()->detach();

        $article->slug  = Str::slug($request->title);
        $article->title = $request->title;
        $article->text  = b64toUrl($request->text);

        if (!empty($request->bg)) {
            $bg = uploadBg($request->bg);
            $article->bg    = $bg['bg'];
            $article->thumb = $bg['thumb'];
        }

        $article->save();

        foreach ( $request->tags as $tag ) {

            $tag_model = Tag::firstOrCreate(['title' => $tag, 'slug' => Str::slug($tag)]);

            $article->tags()->attach($tag_model->id);

        }

        Cache::delete('homepage');
        Cache::delete('article.' . $article->slug);

        return redirect()->route('admin.articles.edit', $article->id);
    }
}
