@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Edit Match</h1>

    <form action="{{ route('facts.update', ['id' => $fact->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="content">Content: </label>
            <input type="text" name="content" value="{{ $fact->content }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('content')
                <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="date">Date: </label>
            <input type="date" name="date" value="{{ $fact->date }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('date')
            <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror

        </div>


        <input type="submit" value="Update" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">

    </form>
@endsection
