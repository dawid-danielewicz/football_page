@extends('layout')

@section('content')
<div class="flex flex-col justify-around">
    <h1 class="text-3xl text-center my-5">Checkout</h1>
    <form action="/payment" method="POST">
        @csrf
        <input type="text" name="price" placeholder="price" class="w-full p-2 border border-gray-400 mb-5 rounded-md shadow-md">
        <input type="text" name="discount" placeholder="discount" class="w-full p-2 border border-gray-400 mb-5 rounded-md shadow-md">
        <select name="payment" class="w-full rounded-md border border-gray-400 shadow-md mb-5 p-2">
            <option value="transfer">Bank Transfer</option>
            <option value="card">Credit Card</option>
        </select>
        <input type="submit" value="Pay" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 cursor-pointer">
    </form>
</div>
@endsection
