@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Tasks</h3>
    </div>

    <div class="p-3 m-3 text-center">
        <button class="btn btn-success"><a class="btn btn-success p-0 m-0" href="{{ route('task.create') }}">Create new task</a></button>
    </div>

    <div class="row justify-content-md-center">
    @foreach($tasks as $task)
        <div class="col-md-6 mb-4">
            <div class="card gradient-card text-white bg-dark">
                <div class="card-header border-bottom border-light">

                    <div class="border-bottom border-light rounded-top">
                        <p class="text-uppercase text-center m-2">{{ $task->status->name }}</p>
                    </div>

                    <div class="align-self-center p-3">
                        <p class="justify-center card-title fs-3">{{ $task->title }}</p>
                    </div>

                </div>

                <div class="card-body white border-bottom border-light">
                    <div class="ml-auto mr-4">
                        <p class="m-4 fs-5">{{ $task->content }}</p>
                    </div>
                </div>

                <div class="card-body border-bottom border-light">

                        @foreach($task->labels as $label)
                            <span class="badge bg-{{$label->color}}">{{$label->name}}</span>
                        @endforeach

                </div>

                <div class="card-body white text-end">
                    <div class="border-bottom border-light">
                        <h4 class="fs-5">Created by {{ $task->user->name }}</h4>
                    </div>
                </div>

                <div class="card-body row">
                    <div class="col d-grid gap-2">
                        <a class="btn btn-outline-info btn-sm" href="{{ route('task.edit', ['task' => $task->id]) }}" type="submit">

                                Edit

                        </a>
                    </div>
                    <div class="col">
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST" class=" d-grid gap-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Подтвердите удаление')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center p-3 m-3">
        {!! $tasks->links() !!}
    </div>
@endsection
