<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3D3791">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite('resources/scss/app.scss')

    <title>@yield('title', 'Let\'s Dance by DJ LIMIX')</title>
</head>
<body>

@yield('content')

</body>
</html>
