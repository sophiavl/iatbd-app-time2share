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
    <body class="flex flex-col justify-center bg-bgcolor">
        <x-navbar></x-navbar>
        <section class="flex items-center">
            <a href="{{ route('products.index')}}"><x-feathericon-arrow-left class="m-4 mr-1 w-7 h-7"></x-feathericon-arrow-left></a>
            <p class="m-4 ml-1 font-medium">Overzicht</p>
        </section>
        <section class="flex flex-col justify-center items-center">
            <img src="{{asset ('images/tent.jpg')}}" class="w-72 h-72" >
            <h2 class="font-medium mt-4 text-xl">{{ $product['title'] }}</h2>
            <h3>{{ $product['category']}}</h3>
            <p class="text-center w-5/6 p-2">{{ $product['description']}}</p>
            <x-button class="mb-12" variant='primary' text="Leen Product"></x-button>
        </section>
    </body>
</html>
