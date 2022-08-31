<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Laravel</title>
</head>

<body>
    <nav class="bg-red-700">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="block h-7 w-auto text-white font-bold">SportPage</a>
                    </div>

                    <div class="block ml-7">
                        <div class="flex space-x-4">
                            <a href="/" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-800">Home</a>
                            <a href="#" class="text-white hover:bg-red-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Club</a>
                            <a href="/articles" class="text-white hover:bg-red-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Articles</a>
                            <a href="/players" class="text-white hover:bg-red-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Players</a>
                            @if(auth()->check() && auth()->user()->hasRole('admin'))
                                <a href="/admin/users" class="text-white hover:bg-red-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    @guest
                    <a href="/login" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-800">Login</a>
                    <a href="/register" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-800">Register</a>
                    @endguest
                    @auth
                        <span class="text-white mr-6">Welcome <a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}" class="hover:font-bold">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline-block">
                            @csrf
                            <a href="{{ route('logout') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-800"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto max-w-7xl sm:px-6 lg-px-8">
        @hasSection('header')
            @yield('header')
        @endif
        @if(url()->current() != url('login') && url()->current() != url('register'))
        <div class="grid grid-cols-3 gap-1">
            <div class="col-span-2 p-5">
                @yield('content')
            </div>
            <div class="p-5">
                @include('sidebar')
            </div>
        </div>
        @else
            <div class="grid grid-cols-3 gap-1">
                <div class="col-span-3 p-5">
                    @yield('content')
                </div>
            </div>
        @endif
    </div>
</body>
