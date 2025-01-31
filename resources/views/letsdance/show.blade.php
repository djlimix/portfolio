<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="theme-color"
          content="#3D3791">
    <link rel="icon"
          href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet"
          href="{{ asset('css/link.css') }}">
    <link rel="stylesheet"
          href="{{ asset('css/djlinks.css') }}">

    <title>Let's Dance {{ $ld->number }} - Guest Mix by {{ $ld->guest }} - made by DJ LIMIX</title>
</head>
<body>

<section>
    <h1>
        Let's Dance {{ $ld->number }} by
        <a href="{{ route('home') }}">DJ LiMix</a>
    </h1>
    <h1>
        Guest Mix by {{ $ld->guest }}
    </h1>

    <img src="{{ asset("storage/artwork/{$ld->id}.jpg") }}"
         alt="artwork"
         style="width: 250px;margin: 0 auto;">

    <div class="links">
        <div class="link">
            <a href="{{ url($ld->soundcloud) }}"
               target="_blank">
                SoundCloud
            </a>
        </div>
        <div class="link">
            <a href="{{ url($ld->apple_podcasts) }}"
               target="_blank">
                Apple Podcasts
            </a>
        </div>
        <div class="link">
            <a href="{{ url($ld->hypeddit) }}"
               target="_blank">
                Free Download
            </a>
        </div>
    </div>
</section>

</body>
</html>
