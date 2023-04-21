<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * @return Task[]\Illuminate\Support\Collection
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::orderByDesc('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return $task
            ? response()->json($task,201)
            : response()->json([],500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->title=$request->title;
        return $task->update()
            ? response()->json($task)
            : response()->json([],500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return $task->delete()
        ? response()->json($task)
        : response()->json([],500);
    }
}