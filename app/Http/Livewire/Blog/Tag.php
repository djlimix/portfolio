<?php

namespace App\Http\Livewire\Blog;

use App\Http\Controllers\TagController;
use Livewire\Component;

class Tag extends Component
{

    /**
     * @var \App\Tag
     */
    private $tag;

    public function mount($tag) {
        $this->tag = (new TagController())->getTagArticles($tag);
    }

    public function render()
    {
        return view('livewire.blog.tag')
            ->withTag($this->tag)
            ->extends('blog');
    }
}
