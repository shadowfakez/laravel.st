@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Create new task</h3>
    </div>

    <form role="form" method="post" action="{{ route('task.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Task title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title input">
        </div>
        <div class="form-group">
            <label for="content">Task content</label>
            <textarea type="text" class="form-control" id="content" name="content" placeholder="Content input"></textarea>
        </div>
        <div class="form-group">
            <label for="status_id">Task status</label>
            <select class="form-control" id="status_id" name="status_id">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
        </div>
    </form>

@endsection
