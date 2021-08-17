@extends('layouts.app')

@section('title', $article->title . ' - Maximilián Csank')

@section('desc', $article->short)

@section('img', asset($article->bg))

@section('date', $article->created_at->format('d-m-Y'))

@section('content')
    <section class="big__text" data-scroll-section="">
        <h1 class="big__text--scroll">
            <div>
                @php($i = 1)
                @foreach(str_split($article->title) as $letter)
                    <?php
                        if ($letter == ' ') {
                            $letter = '&nbsp;';
                        }
                    ?>
                    <span data-scroll data-scroll-position="top" data-scroll-speed="{{ $i }}">{!! $letter !!}</span>
                    @php($i++)
                @endforeach
            </div>
        </h1>
        <a href="/" data-scroll class="big__text__scroll--text">
            <span data-scroll>go home</span>
        </a>
    </section>

    <section class="blog__main" data-scroll-section>
        {!! preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $article->text) !!}
    </section>
@endsection
