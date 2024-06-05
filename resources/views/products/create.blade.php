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
    <body class="flex flex-col justify-center items-center bg-bgcolor">
        <x-navbar></x-navbar>
        <form action='{{ route('products.store')}}' method='POST' class="mt-12">
            @csrf
            <x-inputfield for='Title' name='title'></x-inputfield>
            <x-inputfield for='Category' name='category'></x-inputfield>
            <x-inputfield for='Description' name='description'></x-inputfield>
            <x-inputfield for='Deadline' name='deadline'></x-inputfield>
            <button type='submit' class='bg-accent rounded-lg m-2 mt-2 w-32 h-8 p-2 flex justify-center items-center text-m font-medium'>Add product</button>
        </form>
    </body>

</html>