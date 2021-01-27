@section('title', 'Max\'s blog')

@section('desc', 'This is my personal blog, where I (try to) write articles and express my thoughts.')

@section('img', asset('media/img/share.png'))

@section('body')
    <div class="content" id="ajax-content" style="min-height: 100vh">


        <div class="text-intro" id="site-type">

            <h1>Max's</h1>
            <h1 class="typewrite"><span>life</span></h1>
            <p>New, redesigned.</p>

        </div>


        <!--Portfolio grid-->

        <ul class="portfolio-grid" id="portfolio-sidebar">

            @php($i = 0)
            @foreach($articles as $article)
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
