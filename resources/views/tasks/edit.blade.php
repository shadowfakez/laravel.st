@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Edit task</h3>
    </div>

    <form role="form" method="post" action="{{ route('task.update', ['task' => $task->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <h5><u>Task was created by {{ $task->user->name }}</u></h5>
        </div>

        <div class="form-group mb-3">

            <label for="title" class="form-label">Task title</label>
            <input type="text" class="form-control @error('title') border border-danger @enderror" id="title" name="title" placeholder="Title input" value="{{ $task->title }}">
        </div>

        <div class="form-group mb-3">
            <label for="content" class="form-label">Task content</label>
            <textarea type="text" class="form-control @error('content') border border-danger @enderror" id="content" name="content" placeholder="Content input">{{ $task->content }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="labels" class="form-label">Task labels</label>
            @foreach($labels as $label)
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="{{ $label->id }}" @if(in_array($label->id, $task->labels->pluck('id')->all())) checked @endif id="labels" name="labels[]">
                    <label class="form-check-label">
                        {{ $label->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group mb-3">
            <label for="status_id" class="form-label">Task status</label>
            <select class="form-control @error('status_id') border border-danger @enderror" id="status_id" name="status_id">
                <option disabled selected >Choose status...</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" @if($status->id == $task->status_id) selected @endif>{{ $status->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Сохранить изменения</button>
        </div>
    </form>

@endsection
