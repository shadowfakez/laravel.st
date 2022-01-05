@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Edit task</h3>
    </div>

    <form role="form" method="post" action="{{ route('task.update', ['task' => $task->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <h5><u>Task was created by {{ $task->user->name }}</u></h5>
        </div>
        <div class="form-group">
            <label for="title">Task title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
        </div>
        <div class="form-group">
            <label for="content">Task content:</label>
            <textarea type="text" class="form-control" id="content" name="content" placeholder="Content input">{{ $task->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="status_id">Task status:</label>
            <select class="form-control" id="status_id" name="status_id">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" @if($status->id == $task->status_id) selected @endif>{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Сохранить изменения</button>
        </div>
    </form>

@endsection
