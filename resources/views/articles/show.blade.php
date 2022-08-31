@extends('layout')

@section('content')
    <h2 class="font-bold mb-5 text-3xl">{{ $article->title }}</h2>
    <p>{{ $article->content }}</p>
    <p class="my-5 text-2xl font-bold">Comments: </p>
    @if(auth()->check())
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="content">Content: </label>
            <textarea name="content" class="bg-gray-100 border-gray-300 p-2 rounded-md border w-full h-32">{{ old('content') }}</textarea>

            @error('content')
            <p class="text-red-700 font-bold text-center">{{ $message }}</p>
            @enderror
        </div>

        <input type="hidden" name="user_id" value="1">
        <input type="hidden" name="article_id" value="{{ $article->id }}">

        <input type="submit" value="Create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold mb-5 cursor-pointer hover:bg-teal-700">
    </form>
    @else
        <p class="font-bold text-red-600 text-center mb-7">You must be logged in to write a comment</p>
    @endif
    @if(count($comments) < 1)
        <h3 class="text-xl font-bold text-center my-5">There are no comments yet.</h3>
    @else
        @foreach($comments as $comment)
            <div class="bg-gray-100 border border-gray-300 rounded-md my-5 p-2">
                <p>
                    <span class="font-bold">{{ $comment->user()->first()->name }}:</span> {{ $comment->content }}
                    <hr class="my-1">
                    {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
        @endforeach
    @endif
@endsection
