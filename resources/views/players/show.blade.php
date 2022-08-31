@extends('layout')

@section('content')
    <div class="bg-neutral-100 p-5 shadow-md">
        <h1 class="text-3xl text-bold mb-5">{{ $player->name }} {{ $player->surname }}</h1>
        <p class="mb-2">nationality: <span class="font-bold">{{ $player->nationality }}</span></p>
        <p class="mb-2">position: <span class="font-bold">{{ $player->position }}</span></p>
        <p class="mb-2">number: <span class="font-bold">{{ $player->number }}</span></p>
        <p class="mb-2">height: <span class="font-bold">{{ $player->height }}</span></p>
        <p class="mb-2">weight: <span class="font-bold">{{ $player->weight }}</span></p>
        <p class="mb-2">is injured: <span class="font-bold">{{ $player->is_injured ? 'yes' : 'no' }}</span></p>
        <p class="mb-2">born: <span class="font-bold">{{ $player->born }}</span></p>
        <p class="mb-2">contract until: <span class="font-bold">{{ $player->contract }}</span></p>
        <p class="mb-2">story:</p>
        <p class="mb-2">{{ $player->story }}</p>
    </div>
@endsection
