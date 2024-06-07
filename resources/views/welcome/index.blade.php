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
    <body class="flex justify-center items-center bg-section h-screen">
        <section class="bg-section2 rounded-3xl h-5/6 w-5/6 flex flex-col items-center">
            <section class="flex items-center mb-52 mt-10"><h1 class="text-7xl">Time</h1><h2 class="text-accent text-6xl">2</h2><h2 class="text-7xl">Share</h2></section>
            <section class="flex flex-col">
            <x-button variant="secondary" size="large" text="Log in" route="login" />
            <x-button variant="primary" size="medium" text="Sign up" route="register"/>
            </section>
        </section>
        
    </body>

</html>


