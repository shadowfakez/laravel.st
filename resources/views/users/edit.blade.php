@extends('layouts.layout')

@section('content')

    <div class="page-header mb-3">
        <h3 class="text-center">Edit task</h3>
    </div>

    <form role="form" method="post" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name" class="form-label">User name</label>
            <input type="text" class="form-control @error('name') border border-danger @enderror" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">User email</label>
            <input type="text" class="form-control @error('email') border border-danger @enderror" id="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group mb-3">
            <label for="role" class="form-label">User role</label>
            <select class="form-control @error('role') border border-danger @enderror" id="role" name="role">
                <option disabled selected >Choose role...</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if($role->name == $userRoleName) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Сохранить изменения</button>
        </div>
    </form>

@endsection
