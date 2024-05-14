<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title }}</title>

        @include('normal-style-and-font')
        @include('style')
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
