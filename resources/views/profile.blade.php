<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col items-center bg-bgcolor">
    <x-navbar></x-navbar>
    <div class="w-32 h-32 bg-accent rounded-full mt-4"></div>
    <h2 class="p-2">Hello {{ Auth::user()->name }}!</h2>

    <!-- Formulier sectie -->
    <form action="{{ route('profile.update')}}" method="POST" class="flex flex-col items-center justify-center">
        @csrf
        <x-inputfield size='small' inputtype='normal' for='Name' type='text' id='name' name='name' placeholder='{{ Auth::user()->name }}'></x-inputfield>
        <x-inputfield size='small' inputtype='normal' for='Username' type='text' id='username' name='username' placeholder='{{ Auth::user()->username }}'></x-inputfield>
        <x-inputfield size='small' inputtype='normal' for='E-mail' type='text' id='email' name='email' placeholder='{{ Auth::user()->email }}'></x-inputfield>
        <x-inputfield size='small' inputtype='normal' for='Phone' type='text' id='phone' name='phone' placeholder='{{ Auth::user()->phone }}'></x-inputfield>
        <x-inputfield size='small' inputtype='normal' for='Adress' type='text' id='adress' name='address' placeholder='{{ Auth::user()->address }}'></x-inputfield>
        <button class='bg-accent rounded-lg m-2 mt-2 w-32 h-8 p-2 flex justify-center items-center text-m font-medium' type='submit'>Save</button>
    </form>

    <!-- Sectie "Your products" -->
    <section class="bg-section w-72 mt-4 h-auto rounded-xl flex flex-col flex-wrap justify-center items-center sm:w-5/6">

        <h2 class="p-4 font-medium text-lg">Your products</h2>
        <section class="flex flex-col justify-center items-center w-4/5 sm:flex-row flex-wrap">
            <section class="flex flex-wrap items-center bg-section2 p-4 m-2 rounded-xl w-full">
                @if ($userProducts->isEmpty())
                <p>You haven't added any products yet</p>
                @endif
                @foreach($userProducts as $product)
                <x-product 
                title="{{ $product->title }}" 
                category="{{ $product->category }}"
                photo="{{ $product->photo }}"
                remaining_days="{{ $product->remaining_days}}"
                class="p-3 w-full sm:w-48 md:w-56"></x-product>
                @endforeach
            </section> 
        </section>

        <!-- Sectie "Your borrowed products" -->
        <h2 class="p-4 font-medium text-lg">Your borrowed products</h2>
        <section class="flex flex-col justify-center items-center w-4/5 sm:flex-row flex-wrap">
            <section class="flex flex-wrap items-center bg-section2 p-4 m-2 rounded-xl w-full">
                @if ($borrowedProducts->isEmpty())
                <p>You haven't borrowed any products yet</p>
                @endif
                @foreach($borrowedProducts as $product)
                <x-product 
                    title="{{ $product->title }}" 
                    category="{{ $product->category }}"
                    photo="{{ $product->photo }}"
                    remaining_days="{{ $product->remaining_days}}"
                    class="p-3 w-full sm:w-48 md:w-56"
                ></x-product>
                @endforeach 
            </section>
        </section>

        <!-- Sectie "Your lent products" -->
        <h2 class="p-4 font-medium text-lg">Your lent products</h2>
        <section class="flex flex-col justify-center items-center w-4/5 sm:flex-row flex-wrap">
            <section class="flex flex-wrap items-center bg-section2 p-4 m-2 rounded-xl w-full">
                @if ($lentProducts->isEmpty())
                <p>None of your products have been lent out yet.</p>
                @endif
                @foreach($lentProducts as $product)
                <div class="flex flex-col items-center w-60 sm:w-56 md:w-48 lg:w-48 xl:w-60 2xl:w-52">
                    <x-product 
                        title="{{ $product->title }}" 
                        category="{{ $product->category }}"
                        photo="{{ $product->photo }}"
                        remaining_days="{{ $product->remaining_days}}"
                        class="p-3 w-full"
                    ></x-product>
                    
                        <a href="{{ route('products.returnForm', ['product' => $product->id]) }}" class="bg-accent w-max rounded-lg p-2 mt-2 text-sm">Has been returned</a>
                    </div>
                @endforeach
            </section>
        </section>

        <!-- Sectie "Received Reviews" -->
        <h2 class="p-4 font-medium text-lg">Received Reviews</h2>
        <section class="flex flex-col justify-center items-center flex-wrap mb-12 w-4/5">
            <div class="bg-section2 p-4 m-2 rounded-xl w-full">
                @if ($lentProducts->isEmpty())
                <p>You haven't gotten a review yet.</p>
                @endif
                @foreach($receivedReviews as $review)
                <p class="font-medium text-base">{{ $review->userFrom->name }}</p>
                <p class="font-medium text-sm text-accent">Rating: {{ $review->rating }}</p>
                <p>{{ $review->comment }}</p>
            </div>
            @endforeach
        </section>
    </section>
</body>
</html>
