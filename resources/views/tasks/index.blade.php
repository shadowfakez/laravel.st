@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Tasks</h3>
    </div>
    @if(Auth::check())
    <div class="p-3 m-3 text-center">
        <a class="btn btn-success" href="{{ route('task.create') }}">Create new task</a>
    </div>
    @endif
    <div class="row justify-content-md-center">
    @foreach($tasks as $task)

            <div class="col-md-6 mb-4">
                <div class="card gradient-card text-white bg-dark">
                    <div class="card-header border-bottom border-light">

                        <div class="border-bottom border-light rounded-top ">
                            <p class="text-uppercase text-center text-{{ $task->status->color }} m-2">{{ $task->status->name }}</p>
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


                    <div class="card-body border-bottom border-light text-end">
                        <h4 class="fs-5">Created by {{ $task->user->name }}</h4>
                    </div>

                    @if(Auth::check())
                        @if(Auth::user()->hasRole('admin') or $task->user->id == Auth::user()->id)

                    @if($task->file)

                    <div class="card-body border-bottom border-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 pt-2">
                                    <p class="fs-5 text-decoration-underline">Attached file</p>
                                </div>

                                <div class="col-md-2">
                                    <a class="btn btn-outline-success" href="{{ asset('storage/uploaded_files/' . $task->file) }}">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card-body row">
                        <div class="col ">
                            <a class="btn @if($task->comments->count()) btn-outline-success @else btn-outline-secondary @endif btn-sm d-grid gap-2" href="{{ route('task.show', ['task' => $task->id]) }}" type="submit">


                                @if($task->comments->count())
                                    Open

                                    @if( $task->comments->count() == 1)
                                        ({{ $task->comments->count() }} comment)
                                        @else()
                                        ({{ $task->comments->count() }} comments)
                                    @endif
                                @else
                                    Open
                                @endif

                            </a>
                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col ">
                            <a class="btn btn-outline-info btn-sm d-grid gap-2" href="{{ route('task.edit', ['task' => $task->id]) }}" type="submit">
                                Edit
                            </a>
                        </div>
                        <div class="col">
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" class=" d-grid gap-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('?????????????????????? ????????????????')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center p-3 m-3">
        {!! $tasks->links() !!}
    </div>
@endsection
