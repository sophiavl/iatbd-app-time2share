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
        <h2>All Users</h2>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-w">ID</th>
                    <th class="px-4 py-w">Name</th>
                    <th class="px-4 py-w">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id}}</td>
                    <td class="border px-4 py-2">{{ $user->name}}</td>
                    <td class="border px-4 py-2">{{ $user->email}}</td>
                    <td class="border px-4 py-2">
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
    </body>

</html>
