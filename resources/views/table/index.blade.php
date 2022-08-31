@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Season {{ date('Y') . '/' . date('Y')+1 }}</h1>
    @auth
        <a href="/table/create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 hover:bg-teal-700">Add team</a>
    @endauth
    @if(count($teams) < 1)
        <h2>Table is empty</h2>
    @else
        <table class="w-full">
            <thead>
                <tr>
                    <th>p</th>
                    <th>team</th>
                    <th>matches</th>
                    <th>goals</th>
                    <th>wins</th>
                    <th>draws</th>
                    <th>loses</th>
                    <th>pts</th>
                </tr>
            </thead>
            <tbody>
            @foreach($teams as $i=>$t)
                <tr class="border-b">
                    <th>{{ $i+=1 }}</th>
                    <th>{{ $t->team }} </a></th>
                    <th>{{ $t->matches }}</th>
                    <th>{{ $t->goals }}</th>
                    <th>{{ $t->wins }}</th>
                    <th>{{ $t->draws }}</th>
                    <th>{{ $t->loses }}</th>
                    <th>{{ $t->points }}</th>
                    <th>
                        <a href="{{ route('table.edit', ['id' => $t->id]) }}" class="p-2 bg-blue-600 rounded-md inline-block text-white font-bold my-5 hover:bg-blue-700">Edit</a>
                        <form action="{{ route('table.destroy', ['id' => $t->id]) }}" method="POST" class="inline-block">
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
