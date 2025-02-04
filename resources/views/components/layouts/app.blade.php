<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    <title>{{ $title ?? config('app.name') }}</title>

    @vite('resources/css/app.css')
    @fluxStyles
</head>
<body class="container mx-auto px-4 py-6">

{{ $slot }}

<flux:toast />
@fluxScripts
</body>
</html>
