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
        <section class=" w-full flex justify-center">
            <x-button variant='primary' size='small' text='Add new product' route='products.create'></x-button>
        </section>
        <section class="flex flex-wrap justify-center">
            <?php foreach ($products as $id => $product): ?>
                <a class="flex flex-wrap items-center w-2/5 m-5" href="{{ route('products.details', $id)}}"><x-product size="small" title="{{$product['title']}}" category="{{ $product['category']}}"></x-product></a>
            <?php endforeach ?>
        </section>
    </body>
</html>

