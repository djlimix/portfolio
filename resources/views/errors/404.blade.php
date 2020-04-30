@php
    if (Request::getHttpHost() === "dj.limix.eu") {
	    $suffix = ' / DJ LiMix';
	    $img = asset('dj/img/404.svg');
	    $bg = '#A3A5D9';
	    $colour = '#1E1C59';
    } else if (Request::getHttpHost() === "limixmedia.com") {
	    $suffix = ' / DJ LiMix';
	    $img = asset('media/img/404.svg');
	    $bg = '#EFC88B';
	    $colour = '#7C7C7C';
    } else {
	    $suffix = '';
	    $img = asset('img/404.svg');
	    $bg = '#333533';
	    $colour = '#E5E5E5';
    }
@endphp

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Not Found {{ $suffix }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: {{ $bg }};
                color: {{ $colour }};
                font-family: 'Montserrat', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                flex-flow: column;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 10px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
                padding: 15px;
            }

            .not-found {
                width: 25%;
            }

            @media screen and (max-width: 1036px) {
                .not-found {
                    width: 50%;
                }
            }

            @media screen and (max-width: 567px) {
                .not-found {
                    width: 75%;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div style="display: flex">
                <div class="code">404</div>
                <div class="message">Not Found</div>
            </div>
            <img src="{{ $img }}" alt="not found img" class="not-found">
        </div>
    </body>
</html>
