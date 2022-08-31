@extends('layout')

@section('content')
    <h1 class="text-center my-7 font-bold text-3xl">Players</h1>
    @auth
        <a href="/players/create" class="p-2 bg-teal-600 rounded-md inline-block text-white font-bold my-5 hover:bg-teal-700">Add player</a>
    @endauth
    @if(count($players) < 1)
        <h2>Nie ma zawodników</h2>
    @else
        <table class="w-full">
            <thead>
                <tr>
                    <th>number</th>
                    <th>name</th>
                    <th>position</th>
                    <th>country</th>
                    <th>contract</th>
                </tr>
            </thead>
            <tbody>
            @foreach($players as $player)
                <tr class="border-b">
                    <th>{{ $player->number }}</th>
                    <th><a href="{{ route('players.show', ['player' => $player]) }}">{{ $player->name }} {{ $player->surname }}</a></th>
                    <th>{{ $player->position }}</th>
                    <th>{{ $player->nationality }}</th>
                    <th>{{ $player->contract }}</th>
                    @auth
                        <th>
                            <a href="{{ route('players.edit', ['player' => $player]) }}" class="p-2 bg-blue-600 rounded-md inline-block text-white font-bold my-5 hover:bg-blue-700">Edit</a>
                            <form action="{{ route('players.destroy', ['id' => $player->id]) }}" method="POST" class="inline-block">
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
