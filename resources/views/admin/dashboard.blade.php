<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Laravel</title>
</head>

<body class="bg-gray-100">
    <div class="grid grid-cols-12">
        <div class="sidebar bg-red-500 col-span-2 text-white h-screen border-r-2 border-red-600">
            <div class="border-b-2 border-red-600">
                <p class="font-bold text-center text-2xl py-4">SportPage</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <a href="/" class="py-5 hover:bg-red-600 w-full border-b border-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
                <a href="/admin/users" class="py-5 hover:bg-red-600 w-full border-b border-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg> Users
                </a>
                <a href="/admin/articles" class="py-5 hover:bg-red-600 w-full border-b border-red-600">Articles</a>
            </div>

        </div>
        <div class="content col-span-10">
            <div class="w-full bg-gray-50 py-3 flex items-center justify-between px-7 border-b-2 border-gray-300">
                <form class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute right-2 top-1/3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="search" placeholder="Search" class="border-0 w-96 rounded-md">
                </form>
                <div>
                    <span class="bg-red-500 text-white rounded-full mr-3 px-4 py-2.5">{{ Str::substr(auth()->user()->name, 0, 1) }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <a href="{{ route('logout') }}" class="text-gray-600 px-3 py-2 rounded-md text-sm font-medium bg-gray-200 hover:bg-gray-400 hover:text-white"
                           onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </a>
                    </form>
                </div>

            </div>
            <div class="py-5 px-7">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
