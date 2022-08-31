@extends('layout')

@section('header')
    <div class="grid grid-rows-1 grid-cols-3 grid-flow-col">
        <div class="row-span-2 col-span-2 p-5">
            <div class="bg-neutral-800 rounded overflow-hidden shadow-md h-full">
                <img src="{{ asset('assets/img/soccer-g4e6f80fa7_1920.jpg') }}">
                <div class="m-4 text-white">
                    @if($main_article)
                        <span class="font-bold"><a href="{{ route('articles.show', ['id' => $main_article->id]) }}">{{ $main_article->title }}</a></span>
                        <span class="block">{{ Str::limit($main_article->excerpt, 100) }}</span>
                    @else
                        <p>There is no article</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="p-5">
            <div class="bg-neutral-800 rounded overflow-hidden shadow-md">
                <img src="{{ asset('assets/img/soccer-g4e6f80fa7_1920.jpg') }}">
                <div class="m-4 text-white">
                    @if($first_article)
                        <span class="font-bold"><a href="{{ route('articles.show', ['id' => $first_article->id]) }}">{{ $first_article->title }}</a></span>
                        <span class="block">{{ Str::limit($first_article->excerpt, 60) }}</span>
                    @else
                        <p>There is no article</p>
                    @endif
                </div>
            </div>

            <div class="bg-neutral-800 rounded overflow-hidden shadow-md mt-5">
                <img src="{{ asset('assets/img/soccer-g4e6f80fa7_1920.jpg') }}">
                <div class="m-4 text-white">
                    @if($second_article)
                        <span class="font-bold"><a href="{{ route('articles.show', ['id' => $second_article->id]) }}">{{ $second_article->title }}</a></span>
                        <span class="block">{{ Str::limit($second_article->excerpt, 60) }}</span>
                    @else
                        <p>There is no article</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-2 gap-5">
        @foreach($articles as $article)
            <div class="bg-neutral-800 rounded overflow-hidden shadow-md">
                <img src="{{ asset('assets/img/soccer-g4e6f80fa7_1920.jpg') }}">
                <div class="m-4 text-white">
                    <span class="font-bold">{{ $article->title }}</span>
                    <span class="block">{{ Str::limit($article->excerpt, 150) }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-3 gap-2 mt-7">
        <div>
            <p>Goals</p>
            <table>
                <thead>
                <tr>
                    <td>name</td>
                    <td>pl</td>
                    <td>fa</td>
                    <td>el</td>
                    <td>=</td>
                </tr>
                </thead>
            </table>
        </div>

        <div>
            <p>Assists</p>
            <table>
                <thead>
                <tr>
                    <td>name</td>
                    <td>pl</td>
                    <td>fa</td>
                    <td>el</td>
                    <td>=</td>
                </tr>
                </thead>
            </table>
        </div>

        <div>
            <p>Yellow Cards</p>
            <table>
                <thead>
                <tr>
                    <td>name</td>
                    <td>pl</td>
                    <td>fa</td>
                    <td>el</td>
                    <td>=</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
