@extends('layout')

@section('content')
    @auth
        <a href="/articles/create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 hover:bg-teal-700">Add article</a>
    @endauth
    @if(count($articles) < 1)
        <h2>Nie ma artykułów</h2>
    @else
        <ul class="mb-5">
            <div class="grid grid-cols-2 gap-5">
            @foreach($articles as $article)
                <li>
                    <div class="bg-gray-800 rounded overflow-hidden shadow-md">
                        <img src="{{ asset('assets/img/soccer-g4e6f80fa7_1920.jpg') }}">
                        <div class="m-4 text-white">
                            <span class="font-bold"><a href="{{ route('articles.show', ['id' => $article->id]) }}">{{ Str::limit($article->title, 40) }}</a></span>
                            <span class="block">{{ Str::limit($article->excerpt, 60) }}</span>
                            @auth
                                <a href="{{ route('articles.edit', ['article' => $article]) }}" class="p-2 bg-blue-600 rounded-md inline-block text-white font-bold my-5 hover:bg-blue-700">Edit</a>
                                <form action="{{ route('articles.destroy', ['id' => $article->id]) }}" method="POST" class="inline-block">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="Delete" class="p-2 bg-red-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-red-700" onclick="return confirm('Are you sure?')">
                                </form>
                            @endauth
                        </div>
                    </div>
                </li>
            @endforeach
            </div>
        </ul>
        {{ $articles->onEachSide(5)->links() }}
    @endif
@endsection
