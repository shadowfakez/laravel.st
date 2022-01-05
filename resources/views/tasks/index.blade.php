@extends('layouts.layout')

@section('content')


        <div class="page-header mb-3">
            <h3 class="text-center">Tasks</h3>
        </div>

        <div class="p-3 m-3">
            <button class="btn btn-success"><a class="btn btn-success p-0 m-0" href="{{ route('task.create') }}">Create new task</a></button>
        </div>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Creator</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
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
                        <button class="btn btn-info" type="submit">
                            <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="text-white m-0 p-0">
                                Edit
                            </a>
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Подтвердите удаление')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach()
            </tbody>
        </table>
@endsection
