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
        <form method="POST" action="{{ route('products.storeReview', ['product' => $product->id]) }}">
            @csrf
                <section class="flex flex-col w-2/3 m-6 sm:w-3/5">
                    <label for="rating" class="font-medium text-lg text-neutral-400 flex items-center"><h2>Rating</h2> <p class="text-sm font-normal ml-2" style="color: #63666b;">Enter a number from 1-5</p></label>
                    <input type="number" id="rating" name="rating" min="1" max="5" required class="border-2 border-grey w-12 h-8 p-2 rounded-lg">
                    
                    <label for="comment" class="font-medium text-lg mt-4">Comment</label>
                    <textarea id="comment" name="comment" rows="4" required class="border-2 border-grey p-2 rounded-lg w-80"></textarea>
                    
                    <button type="submit" class="bg-accent rounded-lg mt-4 w-32 h-8 p-2 flex justify-center items-center text-m font-medium">Submit</button>    
                </section>
        </form>
    </body>
</html>

