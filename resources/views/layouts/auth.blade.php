<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | MoonHigh</title>
    @vite(
        [
            'resources/css/app.css', 
            'resources/js/app.js',
        ]
    )

</head>
<body>
    @yield('body')
</body>
</html>
