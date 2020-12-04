<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return view('task.index',[
           'task' => task::all()
       ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('task.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $task = $request->user()->create([
           'task_id' => $request->input('task_id')
       ]);
       return redirect()->route('task.show', [$task]);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\task  $task
    * @return \Illuminate\Http\Response
    */
   public function show(task $task)
   {
       return view('task.show', [
           'task' => $task
       ]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\task  $task
    * @return \Illuminate\Http\Response
    */
   public function edit(task $task)
   {
       return view('task.update', [
           'task' => $task
       ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\task  $task
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, task $task)
   {
       $task->update([
           'task_id' => $request->input('task_id')
       ]);
       return redirect()->route('task.show', [$task]);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\task  $task
    * @return \Illuminate\Http\Response
    */
   public function destroy(task $task)
   {
       $task->delete();
       return redirect()->route('task.index');
   }
}
