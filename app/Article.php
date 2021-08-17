<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['slug', 'ig', 'title', 'text', 'views', 'bg', 'thumb', 'active', 'created_at'];

    public function tags() {
        return $this->belongsToMany('App\Tag')->orderByDesc('created_at');
    }

    public function add( Request $request ) {
        $bg = uploadBg($request);

        $article = new Article();

        $article->slug  = Str::slug($request->title);
        $article->ig    = $request->ig;
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
        Cache::delete('article.'.$article->slug);

        return redirect()->route('admin.articles.edit', $article->id);
    }

    public function edit( Article $article, Request $request ) {
        $article->tags()->detach();

        $article->slug      = Str::slug($request->title);
        $article->ig        = $request->ig;
        $article->title     = $request->title;
        $article->text      = b64toUrl(checkForCode($request->text));

        if ($article->active == '0' && $request->published == '1') {
            $article->created_at = Carbon::today()->toDateTimeString();
        }

        $article->active    = $request->published == '1' ? '1' : '0';

        if (!empty($request->bg)) {
            $bg = uploadBg($request);
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

    public function getStrippedTextAttribute() {
        return trim(strip_tags($this->text));
    }

    public function getShortAttribute() {
        return Str::limit($this->stripped_text, 25);
    }

    public function getReadingTimeAttribute() {
        return floor(str_word_count($this->stripped_text) / 200) ?: 1;
    }

    public function getReadingTimeHtmlAttribute() {
        return $this->reading_time . trans_choice('minutes', $this->reading_time);
    }

    public function getIsNewAttribute() {
        $published_at = $this->created_at->timestamp;
        $two_weeks = 60 * 60 * 24 * 14; // 60 seconds * 60 minutes * 24 hours * 14 days

        return (time() - $published_at) <= $two_weeks;
    }
}
