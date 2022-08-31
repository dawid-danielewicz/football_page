@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Add Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="title">Title: </label>
            <input type="text" name="title" value="{{ old('title') }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('title')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="slug">Slug: </label>
            <input type="text" name="slug" value="{{ old('slug') }}" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">

            @error('slug')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="excerpt">Excerpt: </label>
            <textarea name="excerpt" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full h-32">{{ old('excerpt') }}</textarea>

            @error('excerpt')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror

        </div>

        <div class="mb-5">
            <label for="content">Content: </label>
            <textarea name="content" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full h-96">{{ old('content') }}</textarea>

            @error('content')
            <p class="text-red-700 font-bold text-center">{{  $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="slot">Slot: </label>
            <select id="slot" name="slot" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full">
                @foreach($slots as $slot)
                    <option value="{{ $slot }}" @selected(old('slot') == $slot)>{{ $slot }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="user_id" value="1">

        <input type="submit" value="Create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-teal-700">
    </form>
@endsection
