@extends('admin.dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-5">Articles</h2>
    <table class="w-full bg-gray-50 border-spacing-2 admin-table">
        <thead class="font-bold border-b border-gray-200">
            <tr>
                <td>id</td>
                <td>title</td>
                <td>slug</td>
                <td>excerpt</td>
                <td>content</td>
                <td>created_at</td>
                <td>updated_at</td>
            </tr>
        </thead>
        <tbody class="font-bold">
            @foreach($articles as $article)
                <tr class="h-20 border-b border-gray-200">
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->slug }}</td>
                    <td>{{ Str::limit($article->excerpt, 20) }}</td>
                    <td>{{ Str::limit($article->content, 20) }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td>
                        <a href="#" class="bg-blue-600 text-white rounded-md p-1 pb-2 hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="bg-red-600 text-white rounded-md p-1 pb-2 hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
