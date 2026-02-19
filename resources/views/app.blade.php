<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'iNeedSocial') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png"> <link rel="icon" type="image/svg+xml" href="/favicon.svg"> <link rel="shortcut icon" href="/favicon.ico">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-TileColor" content="#6d28d9">
        <meta name="theme-color" content="#ffffff">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
