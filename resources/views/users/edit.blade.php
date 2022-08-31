@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Edit User</h1>

    <form action="" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="name">Name: </label>
            <input type="text" name="name" value="{{ $user->name }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('name')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="password">New password: </label>
            <input type="password" name="password" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('password')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="confirm">Confirm password: </label>
            <input type="password" name="confirm" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('confirm')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

            @if(session('confirmation'))
                <p class="text-red-700 font-bold text-center">{{ session('confirmation') }}</p>
            @endif
        </div>

        <input type="submit" value="Update" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection

