@extends('layouts.layout')

@section('content')

        @if(session()->get('success'))
            {{ session()->get('success') }}
        @endif

        <div class="page-header mb-3">
            <h3 class="text-center">Tasks</h3>
        </div>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Creator</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status->name }}</td>
                    <td>
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
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
