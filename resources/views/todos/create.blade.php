<!-- resources/views/todos/create.blade.php -->

@extends('layout')

@section('content')
    <h1>Create Todo</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <label for="priority">Priority:</label>
        <select name="priority" id="priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
        <button type="submit">Create</button>
    </form>
@endsection
