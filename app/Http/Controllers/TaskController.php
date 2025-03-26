<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::select('tasks.*', 'u1.name as nguoi_phan_cong_name', 'u2.name as nguoi_lam_name')
            ->join('users as u1', 'tasks.nguoi_phan_cong_id', '=', 'u1.id')
            ->join('users as u2', 'tasks.nguoi_lam_id', '=', 'u2.id')
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->post());
        return response()->json([
            'message' => 'Success',
            'data' => $task
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->fill($request->post())->save();
        return response()->json([
            'message' => 'Success',
            'data' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'message' => 'Success'
        ]);
    }
}
