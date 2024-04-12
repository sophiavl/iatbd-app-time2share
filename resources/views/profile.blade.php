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
        <h2 class="p-2">Hallo Sophia!</h2>

        <form class="flex flex-col items-center justify-center">
            <x-inputfield size='small' inputtype='normal' for='Name' type='text' id='name' name='name'></x-inputfield>
            <x-inputfield size='small' inputtype='normal' for='E-mail' type='text' id='email' name='email'></x-inputfield>
            <x-inputfield size='small' inputtype='normal' for='Phone' type='text' id='phone' name='phone'></x-inputfield>
            <x-inputfield size='small' inputtype='normal' for='Adress' type='text' id='adress' name='adress'></x-inputfield>
        </form>

        <x-button varient='primary' size='small' text='Save'></x-button>

        <section class="bg-section w-72 mt-4 h-auto rounded-xl flex flex-col items-center">
            <h2 class="p-2 font-medium">Loaned products</h2>
                <section class="mx-auto flex flex-wrap justify-center">
                    <x-product size='small'></x-product>
                    <x-product size='small'></x-product>
                    <x-product size='small'></x-product>
                </section>
        </section>
    </body>

</html>
