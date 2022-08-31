@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Matches</h1>
    @auth
        <a href="/matches/create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 hover:bg-teal-700">Add Match</a>
    @endauth
    @if(count($matches) < 1)
        <h2>There is no matches</h2>
    @else
        <table class="w-full">
            <thead>
                <tr>
                    <th>date</th>
                    <th>hour</th>
                    <th>game</th>
                    <th>home</th>
                    <th>home_goals</th>
                    <th>away</th>
                    <th>away_goals</th>
                </tr>
            </thead>
            <tbody>
            @foreach($matches as $match)
                <tr class="border-b">

                    <th>{{ $match->date }} </a></th>
                    <th>{{ $match->hour }}</th>
                    <th>{{ $match->game }}</th>
                    <th>{{ $match->home }}</th>
                    <th>{{ $match->home_goals }}</th>
                    <th>{{ $match->away }}</th>
                    <th>{{ $match->away_goals }}</th>
                    <th>
                        <a href="{{ route('matches.edit', ['id' => $match->id]) }}" class="p-2 bg-blue-600 rounded-md inline-block text-white font-bold my-5 hover:bg-blue-700">Edit</a>
                        <form action="{{ route('matches.destroy', ['id' => $match->id]) }}" method="POST" class="inline-block">
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
