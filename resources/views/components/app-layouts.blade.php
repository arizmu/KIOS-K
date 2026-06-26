<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @fonts

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .base-holiday {
                padding-top: 80px;
                padding-left: 7px;
                padding-right: 7px;
            }
        </style>
        @stack('css')
    </head>

    <body>
        {{ $slot }}
        @stack('js')
    </body>

</html>
