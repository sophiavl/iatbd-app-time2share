<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="flex flex-col justify-center">
        <x-navbar></x-navbar>
        <section class="flex flex-wrap justify-center mx-auto">
            <x-product size="small"></x-product>
            <x-product size="small"></x-product>
            <x-product size="small"></x-product>
            <x-product size="small"></x-product>
            <x-product size="small"></x-product>
            <x-product size="small"></x-product>
            <x-product size="small"></x-product>
            <x-product size="small"></x-product>
        </section>
    </body>
</html>
