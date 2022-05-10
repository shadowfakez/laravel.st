@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Task "{{ $task->title }}"</h3>
    </div>

    <div class="row justify-content-md-center">
        <div class="mb-4">
            <div class="card gradient-card text-white bg-dark">
                <div class="card-header border-bottom border-light">

                    <div class="border-bottom border-light rounded-top">
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
                                        <div class="col-11 pt-2">
                                            <p class="fs-5 text-decoration-underline">Attached file</p>
                                        </div>

                                        <div class="col-1">
                                            <a class="btn btn-outline-success" href="{{ asset('storage/uploaded_files/' . $task->file) }}">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                            <div class="card-body row">
                                <div class="col">
                                    <a class="btn btn-outline-info btn-sm d-grid gap-2" href="{{ route('task.edit', ['task' => $task->id]) }}" type="submit">
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
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">

        <h5 class="mb-4 text-center">COMMENTS</h5>

        <div class="container mb-4">
            <form role="form" method="post" action="{{ route('task.comment', ['task' => $task->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="comment"></label>
                    <textarea class="form-control border border-dark " id="comment" name="comment" rows="3" placeholder="Add comment"></textarea>
                </div>
                <div class="col-auto d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" id="add_comment" data-order="get_comment" class="btn btn-outline-dark">Add comment</button>
                </div>

            </form>
        </div>

        <div class="container m-3">
            @foreach($comments as $comment)
                <div class="row justify-content-md-center">
                    <div class="card text-white bg-dark mb-3">
                        <div class="row g-0">

                            <div class="card-body">
                                <h5 id="c_user_name" class="card-title">{{$comment->user->name}}</h5>
                                <p id="c_user_comment" class="card-text pl-3" style="text-indent: 50px;">{{$comment->comment}}</p>
                                <p id="c_user_date" class="card-text"><small class="text-muted">{{$comment->created_at}}</small></p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


@endsection
