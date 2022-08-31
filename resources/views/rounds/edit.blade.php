@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Edit Match</h1>

    <form action="{{ route('rounds.update', ['id' => $round->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="round_number">Round number: </label>
            <input type="number" name="round_number" value="{{ $round->round_number }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('round_number')
                <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="home_team">Home team: </label>
            <input type="text" name="home_team" value="{{ $round->home_team }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('home_team')
            <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="home_goals">Home team goals: </label>
            <input type="number" name="home_goals" value="{{ $round->home_goals }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('home_goals')
            <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="away_team">Away team: </label>
            <input type="text" name="away_team" value="{{ $round->away_team }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('away_team')
            <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="away_goals">Away team goals: </label>
            <input type="number" name="away_goals" value="{{ $round->away_goals }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('away_goals')
            <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror

        </div>

        <input type="submit" value="Update" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection
