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
    <body class="flex flex-col items-center justify-center bg-section h-screen">
        <section class="bg-section2 rounded-3xl h-5/6 w-5/6 flex flex-col items-center">
            <x-feathericon-clock class="text-accent mt-8 w-10 h-10"/>
            <section class="flex items-center mb-4"><h1 class="text-4xl">Time</h1><h2 class="text-accent text-3xl">2</h2><h2 class="text-4xl">Share</h2></section>
            <form action='{{ route('signup')}}' method='POST' class="flex flex-col items-center justify-center">
                @csrf
                <x-inputfield size='small' inputtype='normal' for='First name' type='text' id='fname' name='fname' inputtype="error"></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Last name' type='text' id='lname' name='lname' inputtype="error"></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Username' type='text' id='username' name='username' inputtype="error"></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='E-mail' type='text' id='email' name='email' inputtype="error"></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Phone' type='text' id='phone' name='phone'></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Address' type='text' id='address' name='address' inputtype="error"></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='City' type='text' id='city' name='city' inputtype="error"></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Password' type='password' id='password' name='password' inputtype="error"></x-inputfield>
                <x-inputfield size='small' inputtype='normal' for='Confirm Password' type='password' id='password_confirmation' name='password_confirmation' inputtype="error"></x-inputfield>

                <button action='submit'>Sign up</button>
            </form>
        </section>
            
    </body>

</html>
