@section('title', '#' . $tag->title)

@section('desc', "Everything, which has tag #{$tag->title}")

@section('img', asset('media/img/share.png'))

@section('body')
    <div class="content" id="ajax-content" style="min-height: 100vh">


        <div class="text-intro" id="site-type">

            <h1 class="typewrite-tag" data-tag="{{ $tag->title }}"><span>#{{ $tag->title }}</span></h1>

        </div>


        <!--Portfolio grid-->

        <ul class="portfolio-grid" id="portfolio-sidebar">

            @php($i = 0)
            @foreach($tag->articles as $article)
                <li class="grid-item" data-jkit="[show:delay={{ 1500 + $i }};speed=500;animation=fade]">
                    <img src="{{ $article->thumb }}">
                    <a class="ajax-link" href="{{ route('blog.article', $article->slug) }}">
                        <div class="grid-hover">
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->short }}</p>
                        </div>
                    </a>
                </li>
                @php($i + 250)
            @endforeach

        </ul>

    </div>

    <div id="ajax-sidebar">

        @include('livewire.blog.sidebar')

    </div>

@endsection
