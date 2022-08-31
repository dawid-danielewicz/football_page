@extends('admin.dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-5">Users</h2>
    <table class="w-full bg-gray-50 border-spacing-2 admin-table">
        <thead class="font-bold border-b border-gray-200">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>email</td>
                <td>warnings</td>
                <td>is banned</td>
            </tr>
        </thead>
        <tbody class="font-bold">
            @foreach($users as $user)
                <tr class="h-20 border-b border-gray-200">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->warnings }}</td>
                    <td>{{ $user->has_ban }}</td>
                    <td>{{ $user->role()->first()->name }}</td>
                    <td><a href="#">Ban</a></td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
