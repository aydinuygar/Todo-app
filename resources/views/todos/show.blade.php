<!-- resources/views/todos/show.blade.php -->

@extends('layout')

@section('content')
    <h1>{{ $todo->title }}</h1>
    <p>{{ $todo->description }}</p>
    <p>Priority: {{ $todo->priority }}</p>
    <p>Completed: {{ $todo->is_completed ? 'Yes' : 'No' }}</p>
    <a href="{{ route('todos.edit', $todo) }}">Edit</a>
    <form action="{{ route('todos.destroy', $todo) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
