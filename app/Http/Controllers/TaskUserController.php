<?php

namespace App\Http\Controllers;
use App\Models\{Task, TaskUser};
use Illuminate\Http\Request;

class TaskUserController extends Controller
{
    //

    /**
     * Ajoute un utilisateur dans un task en utilisant le modèle pivot TaskUser
     *
     * @param Task $task le task pour lequel on ajoute l'utilisateur
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task) {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
        // TODO il faudrait vérifier qu'il n'existe pas déjà dans le task
        $taskUser = new Taskuser(); 
        $taskUser->user_id = $validatedData['user_id']; 
        $taskUser->Task_id = $task->id; 
        $taskUser->save(); 
        return redirect(route('Tasks.show', $task));
    }


    public function destroy(TaskUser $taskUser) { 
        $task = $taskUser->task;
        $taskUser->delete();
        return redirect(route('Tasks.show', $task));
    }

}
