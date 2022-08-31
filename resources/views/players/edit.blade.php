@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Edit Player</h1>

    <form action="{{ route('players.update', ['id' => $player->id]) }}" method="POST" class="text-center">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="name">Name: </label>
            <input type="text" name="name" value="{{ $player->name }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('name')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="surname">Surname: </label>
            <input type="text" name="surname" value="{{ $player->surname }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('surname')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="nationality">Nationality: </label>
            <input type="text" name="nationality" value="{{ $player->nationality }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('nationality')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="number">Number: </label>
            <input type="number" name="number" value="{{ $player->number }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('number')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="story">Story: </label>
            <textarea name="story" class="bg-gray-100 border-gray-300 p-2 rounded-md border">{{ $player->story }}</textarea>

            @error('story')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="height">Height: </label>
            <input type="number" name="height"  value="{{ $player->height }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('height')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="weight">Weight: </label>
            <input type="number" name="weight" value="{{ $player->weight }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('weight')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="position">Position: </label>
            <select id="position" name="position" class="bg-gray-100 border-gray-300 p-2 rounded-md border">
                @foreach($positions as $position)
                    <option value="{{ $position }}" @selected($player->position == $position)>{{ $position }}</option>
                @endforeach
            </select>

            @error('position')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="is_injured">Injury: </label>
            <select id="is_injured" name="is_injured" class="bg-gray-100 border-gray-300 p-2 rounded-md border">
                @if($player->is_injured == 1)
                    <option value="0">No</option>
                    <option value="1" selected>Yes</option>
                @else
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                @endif
            </select>

            @error('is_injured')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="born">Born: </label>
            <input type="date" name="born" value="{{ $player->born }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('born')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="contract">Contract: </label>
            <input type="date" name="contract" value="{{ $player->contract }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border">

            @error('contract')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <input type="submit" value="Update" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection
