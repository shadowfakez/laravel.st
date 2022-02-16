@extends('layouts.layout')

@section('content')
        <div class="page-header mb-3">
            <h3 class="text-center">Users</h3>
        </div>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Role</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                @if(Auth::check() and Auth::user()->hasRole('admin'))
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>
                        @foreach($user->getRoleNames() as $role)
                            {{ $role }}
                        @endforeach
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if(Auth::check() and Auth::user()->hasRole('admin'))
                        <td>
                            <button class="btn btn-info" type="submit">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="text-white m-0 p-0">
                                    Edit
                                </a>
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Подтвердите удаление')">
                                    delete
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach()
            </tbody>
        </table>
@endsection
