<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3D3791">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/link.css') }}">
    <link rel="stylesheet" href="{{ asset('css/djlinks.css') }}">

    <title>Let's Dance by DJ LIMIX</title>
</head>
<body>

<section>
    <h1>Let's Dance by
        <a href="{{ route('home') }}">DJ LiMix</a>
    </h1>

    <img src="{{ asset("img/dj_logo.png") }}?v2" alt="dj logo" style="width: 250px;margin: 0 auto;">

    <div class="links">
        @foreach($episodes as $episode)
            <div class="link">
                <a href="{{ route('ld.show', $episode) }}">
                    Let's Dance {{ $episode->number }}<br>
                    Guest Mix by {{ $episode->guest }}
                </a>
            </div>
        @endforeach
    </div>
</section>

</body>
</html>
