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
    <body class="flex justify-center">
        <x-navbar></x-navbar>
        <section class="flex justify-center bg-section w-5/6 rounded-lg mt-2">

            <ul class="flex mx-auto m-1.5">
                <li class="mx-2"><x-product></x-product></li>
                <li class="mx-2"><x-product></x-product></li>
                <li class="mx-2"><x-product></x-product></li>
            </ul>
        </section>
    </body>

</html>
