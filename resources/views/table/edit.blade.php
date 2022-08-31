@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Edit team</h1>

    <form action="{{ route('table.update', ['id' => $team->id]) }}" method="POST" class="text-center">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="team">Team: </label>
            <input type="text" name="team" value="{{ $team->team }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('team')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="number">Goals: </label>
            <input type="number" name="goals" value="{{ $team->goals }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('goals')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>


        <div class="mb-5">
            <label for="height">Wins: </label>
            <input type="number" name="wins"  value="{{ $team->wins }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('wins')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="weight">Draws: </label>
            <input type="number" name="draws" value="{{ $team->draws }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('draws')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="weight">Loses: </label>
            <input type="number" name="loses" value="{{ $team->loses }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('loses')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <input type="submit" value="Update" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection
