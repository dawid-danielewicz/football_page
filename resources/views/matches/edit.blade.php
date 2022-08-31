@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Edit Match</h1>

    <form action="{{ route('matches.update', ['id' => $match->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="date">Date: </label>
            <input type="date" name="date" value="{{ $match->date }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('date')
                <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="hour">Hour: </label>
            <input type="time" name="hour" value="{{ $match->hour }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('hour')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>


        <div class="mb-5">
            <label for="game">Game: </label>
            <select id="game" name="game" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">
                @foreach($games as $game)
                    <option value="{{ $game }}" @selected($match->game == $game)>{{ $game }}</option>
                @endforeach
            </select>

            @error('game')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="home">Home: </label>
            <input type="text" name="home" value="{{ $match->home }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('home')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="home_goals">Home goals: </label>
            <input type="number" name="home_goals" value="{{ $match->home_goals }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('home_goals')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="away">Away: </label>
            <input type="text" name="away" value="{{ $match->away }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('away')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="away_goals">Away goals: </label>
            <input type="text" name="away_goals" value="{{ $match->away_goals }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('away_goals')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>


        <input type="submit" value="Update" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection
