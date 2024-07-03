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
        

        <section class="bg-section2 flex flex-col w-full">
            <!-- Zoekfunctie -->
            <section class="flex justify-start items-start w-full mb-2">
                <form action="{{ route('products.index') }}" method="GET" class="w-full flex flex-wrap justify-center">
                    <div class="flex flex-col items-start">
                        <label for="search" class="block mb-2 font-medium">Search</label>
                        <input type="text" name="search" id="search" class="form-input w-60 p-1 border border-accent rounded-lg" value="{{ request('search') }}">
                    </div>
                    <div class="flex items-end justify-center">
                        <button type="submit" class="rounded-lg flex justify-center bg-accent w-24 ml-1 items-center text-sm font-medium p-3 pl-6 pr-6 h-8 lg:h-9 xl:text-base 2xl:h-8">Search</button>
                    </div>
                </form>
            </section>
    
            <!-- Filterfunctie -->
            <section class="flex justify-start items-start w-full">
                <form action="{{ route('products.index') }}" method="GET" class="w-full flex flex-wrap justify-center">
                    <div class="flex w-max flex-col items-start">
                        <label for="category" class="block mb-2 font-medium">Category</label>
                            <div class="flex justify-center items-center">
                                <select name="category" id="category" class="w-60 flex align-center form-select p-1 h-8 border border-accent rounded-lg">
                                    <option value="">All</option>
                                    <option value="Electronics" {{ request('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="Tools and DIY" {{ request('category') == 'Tools' ? 'selected' : '' }}>Tools and DIY</option>
                                    <option value="Sports and recreation" {{ request('category') == 'Sports and recreation' ? 'selected' : '' }}>Sports and recreation</option>
                                    <option value="Kitchen Appliances" {{ request('category') == 'Kitchen Appliances' ? 'selected' : '' }}>Kitchen Appliances</option>
                                    <option value="Garden and Outdoor" {{ request('category') == 'Garden and Outdoor' ? 'selected' : '' }}>Garden and Outdoor</option>
                                    <option value="Toys and Games" {{ request('category') == 'Toys and Games' ? 'selected' : '' }}>Toys and Games</option>
                                    <option value="Furniture and Household Items" {{ request('category') == 'Furniture and Household Items' ? 'selected' : '' }}>Furniture and Household Items</option>
                                    <option value="Clothing and Accessories" {{ request('category') == 'Clothing' ? 'selected' : '' }}>Clothing and Accessories</option>
                                    <option value="Musical Instruments" {{ request('category') == 'Musical Instruments' ? 'selected' : '' }}>Musical Instruments</option>
                                </select>
                                <div class="flex items-end mb-2 h-full">
                                    <button type="submit" class="rounded-lg flex justify-center w-24 bg-accent m-1 items-center text-sm font-medium p-3 pl-6 pr-6 h-8 lg:h-9 xl:text-base 2xl:h-8">Filter</button>
                                </div>
                            </div>            
                        
                    </div>
                        
                </form>

                
            </section>
            
        </section>

        <section class="flex justify-center">
            <x-button class="mt-4" variant='primary' text='Add new product' route='products.create'></x-button>
        </section>


        <section class="flex flex-wrap justify-center sm:justify-items-start">
            
            <?php foreach ($products as $product): ?>
                @if ($product->available)
                    <a class="flex flex-wrap items-center m-5" href="{{ route('products.details', $product->id)}}">
                        <x-product title="{{$product->title}}" category="{{ $product->category }}" photo="{{ $product->photo }}" remaining_days="{{ $product->remaining_days}}" productId="{{ $product->id}}"></x-product>
                    </a>
                @endif
            <?php endforeach ?>
        </section>
    </body>
</html>

