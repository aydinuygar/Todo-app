<!-- resources/views/todos/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>Edit Todo</h1>
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $todo->title }}" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $todo->description }}</textarea>
        <label for="priority">Priority:</label>
        <select name="priority" id="priority">
            <option value="low" {{ $todo->priority == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ $todo->priority == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ $todo->priority == 'high' ? 'selected' : '' }}>High</option>
        </select>
        <button type="submit">Update</button>
    </form>
@endsection
