<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Montserrat+Subrayada:wght@700&display=swap"
        rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script defer type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    {{ $assets ?? '' }}

</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body class="antialiased h-screen min-h-screen bg-medium-gray">

    <div class="container h-full mx-auto">

        <header class="mb-4">

            <x-app-bar.index />

        </header>

        <main class="px-2 sm:px-0">
        {{$slot}}
        </main>

    </div>

</body>
