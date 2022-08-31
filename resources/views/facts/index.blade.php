@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Facts</h1>
    @auth
        <a href="/facts/create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 hover:bg-teal-700">Add Fun Fact</a>
    @endauth
    @if(count($facts) < 1)
        <h2>There is no fun facts</h2>
    @else
        <table class="w-full">
            <thead>
                <tr>
                    <th>content</th>
                    <th>date</th>
                </tr>
            </thead>
            <tbody>
            @foreach($facts as $fact)
                <tr class="border-b">
                    <th>{{ $fact->content }}</th>
                    <th>{{ $fact->date}}</th>
                    <th>
                        <a href="{{ route('facts.edit', ['id' => $fact->id]) }}" class="p-2 bg-blue-600 rounded-md inline-block text-white font-bold my-5 hover:bg-blue-700">Edit</a>
                        <form action="{{ route('facts.destroy', ['id' => $fact->id]) }}" method="POST" class="inline-block">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" class="p-2 bg-red-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-red-700" onclick="return confirm('Are you sure?')">
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
