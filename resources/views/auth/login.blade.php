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
    <body class="flex flex-col items-center justify-center bg-section h-screen">
        <section class="bg-section2 rounded-3xl h-5/6 w-5/6 flex flex-col items-center">
            <x-feathericon-clock class="text-accent mt-24 w-20 h-20"/>
            <section class="flex items-center mb-12"><h1 class="text-5xl">Time</h1><h2 class="text-accent text-4xl">2</h2><h2 class="text-5xl">Share</h2></section>
            <form method='POST' action="{{ route('login')}}" class="flex flex-col items-center justify-center">
                @csrf
                <x-inputfield inputtype='normal' for='Username or Email' type='text' id='username' name='username'></x-inputfield>
                <x-inputfield inputtype='normal' for='Password' type='password' id='password' name='password'></x-inputfield>
                <button type='submit' class='bg-accent rounded-lg m-2 mt-2 w-32 h-8 p-2 flex justify-center items-center text-m font-medium'>Log in</button>
            </form>  
        </section>

    </body>

</html>
