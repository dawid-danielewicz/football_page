@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Last round</h1>
    @auth
        <a href="/rounds/create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 hover:bg-teal-700">Add Game</a>
    @endauth
    @if(count($round) < 1)
        <h2>The table is empty</h2>
    @else
        <table class="w-full">
            <thead>
                <tr>
                    <th>home team</th>
                    <th>home goals</th>
                    <th>away goals</th>
                    <th>away team</th>
                </tr>
            </thead>
            <tbody>
            @foreach($round as $r)
                <tr class="border-b">
                    <th>{{ $r->home_team }}</th>
                    <th>{{ $r->home_goals }}</th>
                    <th>{{ $r->away_goals }}</th>
                    <th>{{ $r->away_team }}</th>
                    @auth
                        <th>
                            <a href="{{ route('rounds.edit', ['id' => $r->id]) }}" class="p-2 bg-blue-600 rounded-md inline-block text-white font-bold my-5 hover:bg-blue-700">Edit</a>
                            <form action="{{ route('rounds.destroy', ['id' => $r->id]) }}" method="POST" class="inline-block">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Delete" class="p-2 bg-red-600 rounded-md inline-block text-white font-bold my-5 cursor-pointer hover:bg-red-700" onclick="return confirm('Are you sure?')">
                            </form>
                        </th>
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
