@section('title', $article->title)

@section('desc', Str::words($article->stripped_text))

@section('img', asset($article->bg))

@section('body')
    <div class="content" id="ajax-content">

        <div class="text-intro">

            <img src="{{ asset($article->bg) }}" alt="thumb">

            <h1>{{ $article->title }}</h1>

            <div class="one-column">
                <p>Published {{ $article->created_at->diffForHumans() }}<br>
                    Reading time: {{ $article->reading_time_html }}
                    @if(!empty($article->ig))
                        <br><a href="{{ $article->ig }}" rel="noopener noreferrer" target="_blank" class="ig-link">This article is also on Instagram</a>
                    @endif
                </p>
            </div>

            <div class="two-column">
                <p>
                    @foreach($article->tags as $tag)
                        <a class="ajax-link tag" href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->title }}</a>
                    @endforeach
                </p>
            </div>

            <div class="clear"></div>
            <br><br>

            <div>
                {!! $article->text !!}
            </div>

            <div class="prev-next">

                @if($previous)
                    <div class="prev-button"><a class="ajax-link" href="{{ route('blog.article', $previous->slug) }}">Previous article</a></div>
                @endif
                @if($next)
                    <div class="next-button"><a class="ajax-link" href="{{ route('blog.article', $next->slug) }}">Next article</a></div>
                @endif

            </div>
        </div>

    </div>

    <div id="ajax-sidebar"></div>

@endsection
