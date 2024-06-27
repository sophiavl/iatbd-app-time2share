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
        <form action='{{ route('products.store')}}' method='POST' enctype='multipart/form-data' class="mt-12">
            @csrf
            <x-inputfield for='Title' name='title'></x-inputfield>
            <input type="file" name="photo">
            <section class="flex flex-col items-start">
                <label for="Category">Choose a category</label>
                    <select id="category" name="category" required class="border-1 border-accent w-52 pl-1 w-60 mb-2 mt-1 rounded-xl h-8">
                        <option class="text-xs" value="electronics">Electronics</option>
                        <option class="text-xs" value="tools-diy">Tools and DIY</option>
                        <option class="text-xs" value="sports-recreation">Sports and Recreation</option>
                        <option class="text-xs" value="kitchen-appliances">Kitchen Appliances</option>
                        <option class="text-xs" value="garden-outdoor">Garden and Outdoor</option>
                        <option class="text-xs" value="toys-games">Toys and Games</option>
                        <option class="text-xs" value="books-media">Books and Media</option>
                        <option class="text-xs" value="furniture-household-items">Furniture and Household Items</option>
                        <option class="text-xs" value="clothing-accessories">Clothing and Accessories</option>
                        <option class="text-xs" value="musical-instruments">Musical Instruments</option>
                    </select>
            </section>
            
            <x-inputfield for='Description' name='description'></x-inputfield>
            <x-inputfield for='Deadline' name='deadline' placeholder="dd-mm-yyyy"></x-inputfield>
            <button type='submit' class='bg-accent rounded-lg m-2 mt-2 w-32 h-8 p-2 flex justify-center items-center text-m font-medium'>Add product</button>
        </form>
    </body>

</html>