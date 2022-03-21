<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/link.css') }}">

	<title>Links</title>
</head>
<body>

    <section>
        <h1>Links by <a href="{{ route('home') }}">LiMix Media</a></h1>

        <div class="links">
            @foreach($links as $link)
                <div class="link">
                    <a href="{{ route('redirect.media', ['url' => $link->url, 'referrer' => request()->headers->get('referer')]) }}" target="_blank">{{ $link->title }}</a>
                </div>
            @endforeach
        </div>
    </section>

</body>
</html>
