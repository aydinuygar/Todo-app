<!-- resources/views/todos/show.blade.php -->

@extends('layout')

@section('content')
    <h1 class="mt-4">{{ $todo->title }}</h1>
    <p>{{ $todo->description }}</p>
    <p>Priority: {{ $todo->priority }}</p>
    <p>Completed: {{ $todo->is_completed ? 'Yes' : 'No' }}</p>
    <a href="{{ route('todos.edit', $todo) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
