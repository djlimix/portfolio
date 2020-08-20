<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('dj/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('dj/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('dj/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dj/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('dj/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('dj/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('dj/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('dj/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('dj/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('dj/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dj/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('dj/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dj/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('dj/manifest.webmanifest') }}?v1.1">
    <meta name="msapplication-TileColor" content="#3D3791">
    <meta name="msapplication-TileImage" content="{{ asset('dj/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#3D3791">

	<title>DJ LiMix</title>
</head>
<body>

    <div id="root"></div>

    <script src="{{ asset('dj/js/app.js') }}"></script>
    <script>
        let installPromptEvent;

        window.addEventListener('beforeinstallprompt', (event) => {
            // Prevent Chrome <= 67 from automatically showing the prompt
            event.preventDefault();
            // Stash the event so it can be triggered later.
            installPromptEvent = event;
            console.log(installPromptEvent)
            // Update the install UI to notify the user app can be installed
            document.querySelector('#install-button').disabled = false;
        });
        if ('serviceWorker' in navigator) {
            console.log("Will the service worker register?");
            navigator.serviceWorker.register('service-worker.js')
                .then(function(reg){
                    console.log("Yes, it did.");
                }).catch(function(err) {
                console.log("No it didn't. This happened:", err)
            });
        }
    </script>
</body>
</html>
