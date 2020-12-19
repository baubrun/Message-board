<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message Board</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-600">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="/posts">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="p-3">
                <a href="">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li class="p-3"> 
                    <a href="">{{ auth()->user()->name }}</a>
                </li>
                <li  class="p-3">
                    <a href="">Logout</a>
                </li>
            @endauth
            
            @guest
                <li class="p-3">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endguest

        </ul>

    </nav>
    @yield('content')
</body>

</html>
