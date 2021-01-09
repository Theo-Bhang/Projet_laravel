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
    public function store(Request $request, Task $task) {//Permet d'associer les users et les tasks
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $taskUser = new TaskUser(); 
        $taskUser->user_id = $validatedData['user_id']; 
        $taskUser->task_id = $task->id;
        $taskUser->save();
        return redirect(route('tasks.show', $task));
    }


    public function destroy(TaskUser $taskUser) { //permet de detruire les tasks associée aux user
        $task = $taskUser->task;
        $taskUser->delete();
        return redirect(route('tasks.show', $task));
    }

}
