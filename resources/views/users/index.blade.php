@extends('layouts.layout')

@section('content')

        @if(session()->get('success'))
            {{ session()->get('success') }}
        @endif

        <div class="page-header mb-3">
            <h3 class="text-center">Users</h3>
        </div>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Подтвердите удаление')">
                                delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach()
            </tbody>
        </table>
@endsection
