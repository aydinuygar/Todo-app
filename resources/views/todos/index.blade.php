<!-- resources/views/todos/index.blade.php -->

@extends('layout')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card w-75">
            <h1>Todo List</h1>
            <div class="card-header d-flex justify-content-between align-items-center">
                
                <div class="d-flex justify-content-between w-100">
                    <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New Todo</a>
                    <form action="{{ route('todos.index') }}" method="GET" class="ml-3" style="margin-bottom: 0;">
                        <select name="sort" class="form-control" style="width: auto;" onchange="this.form.submit()">
                            <option value="">Sort by</option>
                            <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Date (Ascending)</option>
                            <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Date (Descending)</option>
                            <option value="priority_asc" {{ request('sort') == 'priority_asc' ? 'selected' : '' }}>Priority (Low to High)</option>
                            <option value="priority_desc" {{ request('sort') == 'priority_desc' ? 'selected' : '' }}>Priority (High to Low)</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($todos as $todo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('todos.show', $todo) }}">{{ $todo->title }}</a>
                                <span class="badge badge-pill badge-{{ $todo->priority == 'high' ? 'danger' : ($todo->priority == 'medium' ? 'warning' : 'success') }}">
                                    {{ ucfirst($todo->priority) }}
                                </span>
                            </div>
                            <span>
                                <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
