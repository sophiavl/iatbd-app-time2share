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
        
        <h2 class="text-2xl font-medium m-8">All Users</h2>
        
        <div class="rounded-lg w-full max-w-6xl">
            <table class="table-auto bg-white m-8">
                <thead>
                    <tr class="">
                        <th class="w-1/3 px-4 py-2 text-left text-xs">ID</th>
                        <th class="w-1/3 px-4 py-2 text-left text-xs">Name</th>
                        <th class="w-1/3 px-4 py-2 text-left text-xs">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b border-accent">
                        <td class="px-2 py-2 border-l border-t border-accent text-xs md:text-sm xl:text-base">{{ $user->id}}</td>
                        <td class="px-2 py-2 border-t border-accent text-xs md:text-sm xl:text-base">{{ $user->name}}</td>
                        <td class="px-2 py-2 border-t border-accent text-xs md:text-sm xl:text-base">{{ $user->email}}</td>
                        <td class="px-4 py-2 border-t border-bgcolor bg-accent text-xs md:text-sm xl:text-base">
                            @if(!$user->is_blocked)
                            <form action="{{ route('users.block', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to block this user?');">
                                @csrf
                                <button type="submit" >Block</button>
                            </form>
                            @else
                            <form action="{{ route('users.unblock', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to unblock this user?');">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Unblock</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
               
    </body>

</html>
