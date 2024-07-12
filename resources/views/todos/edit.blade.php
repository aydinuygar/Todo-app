<!-- resources/views/todos/edit.blade.php -->

@extends('layout')

@section('content')
    <h1 class="mt-4">Edit Todo</h1>
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $todo->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <option value="low" {{ $todo->priority == 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ $todo->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ $todo->priority == 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
