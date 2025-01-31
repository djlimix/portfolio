<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3D3791">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/link.css') }}?v1.5">
    <link rel="stylesheet" href="{{ asset('css/djlinks.css') }}">

    <title>Yearmix 2022</title>
</head>
<body>

<section>
    <h1>Yearmix 2022</h1>
    <h2>Vyber si, kde si ho chceš vypočuť:</h2>

    <div class="links">
        <div class="link">
            <a href="{{ url('2022', ['redirect' => 'sc']) }}" target="_blank">Soundcloud</a>
            <a href="{{ url('2022', ['redirect' => 'mixcloud']) }}" target="_blank">Mixcloud</a>
            <a href="{{ url('2022', ['redirect' => 'gpodcasts']) }}" target="_blank">Google Podcasts</a>
            <a href="{{ url('2022', ['redirect' => 'apodcasts']) }}" target="_blank">Apple Podcasts</a>
            <a href="{{ url('2022', ['redirect' => 'hypedit']) }}" target="_blank">stiahnuť zadarmo</a>
        </div>
    </div>
</section>

</body>
</html>
