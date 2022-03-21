<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileColor" content="#13315C">
    <meta name="theme-color" content="#13315C">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/locomotive-scroll.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}?v1.2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title')</title>

    {{-- SEO --}}
    <meta name="author" content="Maximilián Csank">
    <meta name="designer" content="Maximilián Csank">
    <meta name="date" content="@yield('date', '2022-03-21')">
    <meta name="rating" content="General">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('desc')"/>
    <meta name="keywords" content="maximilian csank,maximilián,csank,backend,php,laravel,developer,windows,android,ios,phpstorm,vs code,jetbrains,datagrip,microsoft,google,composer,node,nodejs,react native,vue,api,apps,websites,app,website,rimavska sobota,rimavská sobota,slovakia,kosice,košice,dj,slovensko,montego music club,lightjockey,discjockey,web developer,webdeveloper,limixmedia,limix media,djlimix,dj limix">
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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163388035-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163388035-3');
    </script>
</head>
<body data-scroll-container>

    <div id="swup" class="transition-fade">
        @yield('content')

        <main @class(['last__section', 'white' => request()->segment(1) === 'writing']) data-scroll-section>
            <p class="last__section--scroll">
                love always,<br>Max
            </p>
            <div class="last__section--links">
                <a data-scroll href="https://instagram.com/limixmedia/" target="_blank" rel="noopener noreferrer">instagram</a>
                <a data-scroll href="https://www.linkedin.com/in/maximilian-csank/" target="_blank" rel="noopener noreferrer">linkedin</a>
                <a data-scroll href="https://github.com/djlimix/" target="_blank" rel="noopener noreferrer">github</a>
                <a data-scroll href="mailto:info@limixmedia.com" target="_blank" rel="noopener noreferrer">email</a>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/locomotive-scroll.min.js') }}"></script>
    <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
