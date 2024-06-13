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
        <body class="flex flex-col items-center bg-bgcolor">
            <x-navbar></x-navbar>
            <div class="w-32 h-32 bg-accent rounded-full mt-4"></div>
            <h2 class="p-2">Hello {{ Auth::user()->name}}!</h2>
            

            <form action="{{ route('profile.update')}}" method="POST" class="flex flex-col items-center justify-center">
                @csrf
                <x-inputfield size='small' inputtype='normal' for='Name' type='text' id='name' name='name' placeholder='{{ Auth::user()->name}}'></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Username' type='text' id='username' name='username' placeholder='{{ Auth::user()->username}}'></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='E-mail' type='text' id='email' name='email' placeholder='{{ Auth::user()->email}}'></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Phone' type='text' id='phone' name='phone' placeholder='{{ Auth::user()->phone}}'></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Adress' type='text' id='adress' name='address' placeholder='{{ Auth::user()->address}}'></x-inputfield>
                <button class='bg-accent rounded-lg m-2 mt-2 w-32 h-8 p-2 flex justify-center items-center text-m font-medium' type='submit'>Save</button>
            </form>


            <section class="bg-section w-72 mt-4 h-auto rounded-xl flex flex-col flex-wrap justify-center items-center sm:w-5/6">
                <h2 class="p-4 font-medium text-lg">Your products</h2>
                    <section class="flex flex-col justify-center items-center sm:flex-row flex-wrap">
                        @foreach($userProducts as $product)
                        <x-product 
                        title="{{ $product->title }}" 
                        category="{{ $product->category }}"
                        photo="{{ $product->photo }}" class="p-3"></x-product>
                        @endforeach   
                    </section>
            </section>
        </body>

    </html>
