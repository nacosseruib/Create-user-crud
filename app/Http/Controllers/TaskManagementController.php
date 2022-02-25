<?php

namespace App\Http\Controllers;

use App\Models\TaskManagement;
use Illuminate\Http\Request;


class TaskManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        try{
             $data['getTask'] =  TaskManagement::where('status', 1)
             ->orderBy('priority', 'Asc')
             ->orderBy('id', 'desc')
             ->paginate(10, ['id', 'task_name', 'priority', 'status']);
        }catch(\Throwable $errorThrown){}

        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store new task
        $is_save = null;
        $this->validate($request,
        [
           'taskName' => ['required', 'string', 'max:100'],
           'priority' => ['required', 'numeric'],
        ]);
        try{
            $is_save = TaskManagement::create([
                'task_name' => $request['taskName'],
                'priority'  => $request['priority'],
            ]);
        }catch(\Throwable $errorThrown){
            return redirect()->back()->with('danger', 'Server error occurred. Try again.')->withInput($request->all());
        }
        if($is_save)
        {
            return redirect()->back()->with('success', 'Task was created successfully');
        }
        return redirect()->back()->with('error', 'Unable to create Task. Try again.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskManagement  $taskManagement
     * @return \Illuminate\Http\Response
     */
    public function show(TaskManagement $taskManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskManagement  $taskManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskManagement $taskManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskManagement  $taskManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null, TaskManagement $taskManagement)
    {
        //store new task
        $is_update = null;
        $this->validate($request,
        [
           'taskName' => ['required', 'string', 'max:100'],
           'priority' => ['required', 'numeric'],
        ]);
        try{
            //$request['recordID']
            $is_update = $taskManagement::where('id', $id)->update([
                'task_name' => $request['taskName'],
                'priority'  => $request['priority'],
            ]);
        }catch(\Throwable $errorThrown){
            return redirect()->back()->with('danger', 'Server error occurred. Try again.')->withInput($request->all());
        }
        if($is_update)
        {
            return redirect()->back()->with('success', 'Task was update successfully');
        }
        return redirect()->back()->with('error', 'Unable to update Task. Try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskManagement  $taskManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskManagement $taskManagement, $id = null)
    {
        try{
            if($taskManagement::find($id)->delete())
            {
                return redirect()->back()->with('success', 'Task was deleted successfully');
            }
        }catch(\Throwable $errorThrown){}
        return redirect()->back()->with('danger', 'Unable to delete Task!');
    }
}
