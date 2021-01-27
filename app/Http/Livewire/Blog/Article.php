<?php

namespace App\Http\Livewire\Blog;

use App\Http\Controllers\ArticleController;
use Livewire\Component;

class Article extends Component
{

    /**
     * @var \App\Article
     */
    private $article;

    public function mount($article) {
        $this->article = (new ArticleController())->getArticle($article);
    }

    public function render()
    {
        $previous = \App\Article::where('id', '<', $this->article->id)->latest()->first();
        $next = \App\Article::where('id', '>', $this->article->id)->first();

        return view('livewire.blog.article')
                ->withArticle($this->article)
                ->withPrevious($previous)
                ->withNext($next)
                ->extends('blog');
    }
}
