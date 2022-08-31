@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Create Match</h1>

    <form action="{{ route('matches.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="date">Date: </label>
            <input type="date" name="date" value="{{ old('date') }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('date')
                <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="hour">Hour: </label>
            <input type="time" name="hour" value="{{ old('hour') }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('hour')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>


        <div class="mb-5">
            <label for="game">Game: </label>
            <select id="game" name="game" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">
                @foreach($games as $game)
                    <option value="{{ $game }}" @selected(old('game') == $game)>{{ $game }}</option>
                @endforeach
            </select>

            @error('game')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="home">Home: </label>
            <input type="text" name="home" value="{{ old('home') }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('home')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="away">Away: </label>
            <input type="text" name="away" value="{{ old('away') }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('away')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>


        <input type="submit" value="Create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection
