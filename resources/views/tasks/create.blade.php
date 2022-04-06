@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Create new task</h3>
    </div>

    <form role="form" method="post" action="{{ route('task.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="title" class="form-label">Task title</label>
            <input type="text" class="form-control @error('title') border border-danger @enderror" id="title" name="title" placeholder="Title input" value="{{ old('title') }}">
        </div>

        <div class="form-group mb-3">
            <label for="content" class="form-label">Task content</label>
            <textarea type="text" class="form-control @error('content') border border-danger @enderror" id="content" name="content" placeholder="Content input">{{ old('content') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="labels" class="form-label">Task labels</label>
            @foreach($labels as $label)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $label->id }}" id="labels" name="labels[]">
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
                    <option {{ old('status_id') == $status->id ? "selected" : "" }} value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="taskFile" class="form-label">Add file</label>
            <input class="form-control" type="file" id="taskFile" name="taskFile">
        </div>

        <a href="{{ asset('storage/1.txt') }}">file</a>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
        </div>
    </form>

@endsection
