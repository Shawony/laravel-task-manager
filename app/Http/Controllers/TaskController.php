<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $userId = $user->id;

        $tasks = Task::where('completed', false)->where('user_id', $userId)->orderBy('priority', 'desc')->orderBy('due_date')->get();


        // Fetch tasks for the logged-in user
        //$tasks = Auth::user()->user->tasks()->orderBy('priority', 'desc')->orderBy('due_date')->get();



        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {

        $userId = Auth::user()->id;

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required|max:255',
            'due_date' => 'required|max:255',
        ]);
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'user_id' => $userId
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required|in:low,medimu,high',
            'due_date' => 'required|max:255',
        ]);
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
    }

    public function complete(Task $task)
    {
        $task->update([
            'completed' => true,
            'completed_at' => now(),
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task Completed Successfully');
    }

    public function showCompleted()
    {
        $userId = Auth::user()->id;

        $completedTasks= Task::where('completed',true)->where('user_id', $userId)->orderBy('completed_at','desc')->get();
        // $completedTasks = Auth::user()->tasks()->where('completed', true)->orderBy('completed_at', 'desc')->get();

        return view('tasks.taskshow', compact('completedTasks'));
    }
}
