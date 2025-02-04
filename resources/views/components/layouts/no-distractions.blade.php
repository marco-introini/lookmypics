
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
<body>

<div class="flex items-center justify-center min-h-screen">
    {{ $slot }}
</div>

<flux:toast />
@fluxScripts
</body>
</html>
