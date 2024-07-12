<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $sort = $request->get('sort', '');

        switch ($sort) {
            case 'date_asc':
                $todos = Todo::orderBy('created_at', 'asc')->get();
                break;
            case 'date_desc':
                $todos = Todo::orderBy('created_at', 'desc')->get();
                break;
            case 'priority_asc':
                $todos = Todo::orderByRaw("FIELD(priority, 'low', 'medium', 'high')")->get();
                break;
            case 'priority_desc':
                $todos = Todo::orderByRaw("FIELD(priority, 'high', 'medium', 'low')")->get();
                break;
            default:
                $todos = Todo::orderBy('created_at', 'desc')->get(); // Varsayılan olarak en yeni en üstte
                break;
        }

        return view('todos.index', compact('todos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        Todo::create($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    
    }
}
