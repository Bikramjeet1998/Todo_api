<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodosController extends Controller
{
    // Get all todos
    public function getAllTodos()
    {
        $todos = Todos::all();
        return response()->json($todos);
    }

    // Get a single todo by ID
    public function getTodoById($id)
    {
        $todo = Todos::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        return response()->json($todo);
    }

    // Create a new todo
    public function createTodo(Request $request)
    {
        $request->validate([
            'title' => 'required|string',     
        ]);

        $todo = Todos::create($request->all());
    if($todo){
        return response()->json([
            'status' => 'success',
            'message' => 'Todo created successfully',
            'data' => $todo,
        ], 201);
    }else{
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to create todo',
        ], 500);
    }
    }

    // Update an existing todo
    public function updateTodo(Request $request, $id)
    {
        $request->validate([
            'title' => 'string',           
        ]);

        $todo = Todos::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->update($request->all());
        if($todo){
            return response()->json([
                'status' => 'success',
                'message' => 'Todo updated successfully',
                'data' => $todo,
            ], 200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update todo',
            ], 500);
        }

       
    }

    // Delete a todo
    public function deleteTodo($id)
    {
        $todo = Todos::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->delete();
        if($todo){
            return response()->json([
                'status' => 'success',
                'message' => 'Todo deleted successfully',
            ], 200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete todo',
            ], 500);
        }

       
    }
}
