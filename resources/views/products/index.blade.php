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
        <section class="flex justify-center">
            <x-button variant='primary' text='Add new product' route='products.create'></x-button>
        </section>

        <!-- Zoekfunctie -->
        <section class="flex justify-center mt-5">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-wrap justify-center">
                
                <div class="m-2">
                    <label for="search" class="block mb-2">Search</label>
                    <input type="text" name="search" id="search" class="form-input p-1 border border-accent rounded" value="{{ request('search') }}">
                </div>
                <div class="m-1 flex items-end">
                    <button type="submit" class="rounded-lg flex justify-center bg-accent m-1 items-center text-sm p-3 pl-6 pr-6 h-8 lg:h-9 xl:text-base 2xl:h-8">Search</button>
                </div>
            </form>
        </section>

        <!-- Filterfunctie -->
        <section class="flex justify-center mt-5">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-wrap justify-center">
                <div class="m-2">
                    
                    <label for="category" class="block mb-2">Category</label>
                    <select name="category" id="category" class="form-select p-1 border border-accent rounded">
                        <option value="">All</option>
                        <option value="Electronics" {{ request('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="Tools and DIY" {{ request('category') == 'Tools and DIY' ? 'selected' : '' }}>Tools and DIY</option>
                        <option value="Sports and recreation" {{ request('category') == 'Sports and recreation' ? 'selected' : '' }}>Sports and recreation</option>
                        <option value="Kitchen Appliances" {{ request('category') == 'Kitchen Appliances' ? 'selected' : '' }}>Kitchen Appliances</option>
                        <option value="Garden and Outdoor" {{ request('category') == 'Garden and Outdoor' ? 'selected' : '' }}>Garden and Outdoor</option>
                        <option value="Toys and Games" {{ request('category') == 'Toys and Games' ? 'selected' : '' }}>Toys and Games</option>
                        <option value="Furniture and Household Items" {{ request('category') == 'Furniture and Household Items' ? 'selected' : '' }}>Furniture and Household Items</option>
                        <option value="Clothing and Accessories" {{ request('category') == 'Clothing and Accessories' ? 'selected' : '' }}>Clothing and Accessories</option>
                        <option value="Musical Instruments" {{ request('category') == 'Musical Instruments' ? 'selected' : '' }}>Musical Instruments</option>
                    </select>
                </div>
                
                <div class="m-2">
                    <label for="availability" class="block mb-2">Availability</label>
                    <select name="availability" id="availability" class="form-select p-1 border border-accent rounded">
                        <option value="">All</option>
                        <option value="available" {{ request('availability') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ request('availability') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>
                <div class="m-1 flex items-end">
                    <button type="submit" class="rounded-lg flex justify-center bg-accent m-1 items-center text-sm p-3 pl-6 pr-6 h-8 lg:h-9 xl:text-base 2xl:h-8">Filter</button>
                </div>
            </form>
        </section>

        <section class="flex flex-wrap justify-center sm:justify-items-start">
            
            <?php foreach ($products as $id => $product): ?>
                @if ($product->available)
                    <a class="flex flex-wrap items-center m-5" href="{{ route('products.details', $product->id)}}">
                        <x-product title="{{$product->title}}" category="{{ $product->category }}" photo="{{ $product->photo }}" remaining_days="{{ $product->remaining_days}}" productId="{{ $product->id}}"></x-product>
                    </a>
                @endif
            <?php endforeach ?>
        </section>
    </body>
</html>

