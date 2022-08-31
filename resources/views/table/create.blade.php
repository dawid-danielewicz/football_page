@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Create Table</h1>

    <form action="{{ route('table.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="team">Team: </label>
            <input type="team" name="team" value="{{ old('team') }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('team')
                <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <input type="submit" value="Create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection
