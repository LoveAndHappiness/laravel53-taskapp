<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        // dd$tas
        
        return view('tasks.index', compact('tasks', $tasks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $task = [
            'title' => $request->title,
            'completed' => false
        ];

        Task::create($task);
        
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::find($id);

        return view('tasks.edit', compact('task', $task));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::find($id);

        $updatedTask = [
            'title' => $request->title,
            'completed' => $task->completed
        ];

        $task->update($updatedTask); 

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('tasks');
    }

    public function toggleTaskCompletion(Request $request, $id) {

        $task = Task::find($id);

        if ($task->completed) {
            $updatedTask = [
                'title' => $task->title, 
                'completed' => false
            ];
        } else {
            $updatedTask = [
                'title' => $task->title,
                'completed' => true
            ];
        }


        $task->update($updatedTask); 

        return redirect('tasks');
    }
}
