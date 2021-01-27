<?php

namespace App\Http\Livewire\Blog;

use App\Http\Controllers\ArticleController;
use Livewire\Component;

class Home extends Component
{
    /**
     * @var array
     */
    private $articles;

    public function mount() {
        $this->articles = (new ArticleController())->getArticles();
    }

    public function render()
    {
        return view('livewire.blog.home')
                ->withArticles($this->articles)
                ->extends('blog');
    }
}
