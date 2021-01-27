@php
Assets::add([
	'new.css',
	'blog.css',
    'https://kit.fontawesome.com/93a1e10f90.js',
    'jquery.min.js',
    'jquery.easing.min.js',
    'modernizr.custom.42534.js',
    'jquery.waitforimages.js',
    'typed.js',
    'masonry.pkgd.min.js',
    'imagesloaded.pkgd.min.js',
    'jquery.jkit.1.2.16.min.js',
    'script.js'
])->config(['pipeline' => 'auto'])
@endphp
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163388035-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163388035-3');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#13315C">
    <meta name="msapplication-TileImage" content="{{ asset('/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#13315C">

{{--    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">--}}

    {!! Assets::css() !!}

    <title>@yield('title')</title>

    {{-- SEO --}}
    <meta name="description" content="@yield('desc')"/>
    <link rel="canonical" href="{{ request()->fullUrl() }}">

    {{-- FB --}}
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('desc')">
    <meta property="og:image" content="@yield('img')">

    {{-- FB --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:creator" content="@limixmedia">
    <meta property="twitter:site" content="@limixmedia">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('desc')">
    <meta property="twitter:image" content="@yield('img')">

    {{--    <link rel="stylesheet" href="{{ asset('css/desert.css') }}">--}}

    @livewireStyles
    @livewireScripts

{{--    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>--}}
{{--    <script src="https://kit.fontawesome.com/93a1e10f90.js" crossorigin="anonymous"></script>--}}
</head>
<body>

    <div class="preloader" id="preloader">
        <div class="item">
            <div class="spinner">
            </div>
        </div>
    </div>

    <div class="opacity-nav">

        <div class="menu-index" id="buttons" style="z-index:999999">
            <i class="fa fa-close"></i>
        </div>

        <ul class="menu-fullscreen">
            <li><a class="ajax-link" href="{{ route('blog.home') }}">Home</a></li>
            <li><a href="{{ url('//dj.limix.eu') }}">DJ LiMix</a></li>
            <li><a href="{{ url('//limixmedia.com') }}">LiMix Media</a></li>
        </ul>

    </div>


    <!--Header-->
    <header id="fullscreen">

        <div class="logo" id="full"><a class="ajax-link" href="{{ route('blog.home') }}">LiMix Media</a></div>

        <div class="menu-index" id="button">
            <i class="fa fa-bars"></i>
        </div>

    </header>

    <div class="clear"></div>

    @yield('body')

    <footer>

        <div class="footer-margin">
            <div class="social-footer">
                <a href="https://www.facebook.com/limixmedia" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/limixmedia" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/maximilian-csank/" target="_blank"><i class="fa fa-linkedin"></i></a>

            </div>
            <div class="copyright">© Copyright {{ \Carbon\Carbon::now()->year }} LiMix Media. Template by <a href="https://thomsoon.com/" target="_blank">Thomsoon</a>. All Rights Reserved.</div>

        </div>

    </footer>



    <!--Scripts-->

    {{--<script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/modernizr.custom.42534.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.waitforimages.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/typed.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.jkit.1.2.16.min.js') }}"></script>

    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>--}}

    {!! Assets::js() !!}

    <script>
        $('#button, #buttons').on('click', function() {
            $( ".opacity-nav" ).fadeToggle( "slow", "linear" );
            // Animation complete.
        });
    </script>

    {{--    <div id="root"></div>--}}

    {{--    <script src="{{ asset('js/app.js') }}?v1.2.1"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?skin=desert"></script>--}}
</body>
</html>
