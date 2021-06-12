<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href=" {{asset('css/home.css')}} ">
        <title>MoonLight</title>

    </head>
    <body>
    <div class = 'container'>
        <div class = 'overlay'></div>
        <div class="text">
            <h2>Hi! Welcome to</h2>
            <h1>MoonLight</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aperiam tempora sint cum, odit, tempore vel voluptates excepturi incidunt eligendi laboriosam consectetur fugiat perferendis reprehenderit quaerat ex? Esse, molestiae blanditiis?</p>
            <div class="links">
                <a href="{{ route('login') }}">Get Started</a>
            </div>
        </div>

    </div>

    </body>
</html>

