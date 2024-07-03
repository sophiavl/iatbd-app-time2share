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
            <a href="{{ route('products.index')}}"><x-feathericon-arrow-left class="m-4 mr-1 w-6 h-6 2xl:w-11 h-11"></x-feathericon-arrow-left></a>
            <p class="m-4 ml-1 font-medium">Overzicht</p>
        </section>
        <section class="flex flex-col justify-center items-center">
            <img src="{{asset ($product->photo)}}" class="w-72 h-72 mb-2 md:w-96 md:h-96" >
            <h2 class="font-medium text-base sm:text-xl 2xl:text-2xl">{{ $product->title }}</h2>
            <h3 class="text-sm text-grey md:text-base">{{ $product->category}}</h3>
            <p class="text-center mt-2 w-5/6 p-2 text-sm md:text-base 2xl:text-lg">{{ $product->description}}</p>
            <form action="{{route('products.borrow', ['product' => $product->id])}}" method="POST">
                @csrf
                <button type="submit" class="bg-accent rounded-lg m-2 mt-2 h-8 p-2 flex justify-center items-center text-m font-medium">
                    Borrow Product
                </button>
            </form>
        </section>
    </body>
</html>
