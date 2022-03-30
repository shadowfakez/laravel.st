@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Task "{{ $task->title }}"</h3>
    </div>

    <div class="row justify-content-md-center">
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
                @if(Auth::check())
                    @if(Auth::user()->hasRole('admin') or $task->user->id == Auth::user()->id)

                            <div class="card-body row">
                                <div class="col">
                                    <btn class="btn btn-outline-info btn-sm d-grid gap-2" href="{{ route('task.edit', ['task' => $task->id]) }}" type="submit">
                                        Edit
                                    </btn>
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
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        COMMENTS

        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="..." alt="...">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Заголовок медиа</h4>
                ...
            </div>
        </div>
    </div>

@endsection
