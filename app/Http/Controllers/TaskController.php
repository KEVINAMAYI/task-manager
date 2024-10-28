<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('due_date')) {
            $query->where('due_date', $request->due_date);
        }

        return response()->json($query->paginate(10));  // Pagination
    }


    public function create(Request $request)
    {
        // Validate the incoming data
        $this->validate($request, [
            'title' => 'required|unique:tasks',
            'due_date' => 'required|date|after:today',
        ]);

        // Create the task using the decoded data
        $task = Task::create($data);
        return response()->json($task, 201);
    }



    public function show($id)
    {
        $task = Task::find($id);
        return $task ? response()->json($task) : response()->json(['error' => 'Task not found'], 404);
    }


    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $this->validate($request, [
            'title' => 'sometimes|unique:tasks,title,' . $id,
            'due_date' => 'sometimes|date|after:today',
        ]);

        $task->update($request->all());
        return response()->json($task);
    }


    public function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Task not found'], 404);
    }


    public function search(Request $request)
    {
        $query = Task::query();

        if ($request->has('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        return response()->json($query->paginate(10));
    }

}
