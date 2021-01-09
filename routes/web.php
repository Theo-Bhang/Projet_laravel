<?php

use App\Http\Controllers\{BoardController, BoardUserController, TaskController, TaskUserController};
use App\Models\{Board,BoardUser,TaskUser,Task};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//BOARDS ROUTES

Route::get('boards', [BoardController::class, 'index'])->middleware('auth')->name('boards.index');
Route::get('boards/create', [BoardController::class, 'create'])->middleware('auth')->name('boards.create');
Route::post('boards', [BoardController::class, 'store'])->middleware('auth')->name('boards.store');
Route::get('boards/{board}', [BoardController::class, 'show'])->middleware('auth')->name('boards.show');
Route::get('boards/{board}/edit', [BoardController::class, 'edit'])->middleware('auth')->name('boards.edit');
Route::put('boards/{board}', [BoardController::class, 'update'])->middleware('auth')->name('boards.update');
Route::delete('boards/{board}', [BoardController::class, 'destroy'])->middleware('auth')->name('boards.destroy');

//TASKS ROUTES

Route::get('boards/{board}/tasks', [TaskController::class, 'index'])->middleware('auth')->name('tasks.index');
Route::get('boards/{board}/tasks/create', [TaskController::class, 'create'])->middleware('auth')->name('tasks.create');
Route::post('boards/{board}/tasks', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');
Route::get('boards/{board}/tasks/{task}', [TaskController::class, 'show'])->middleware('auth')->name('tasks.show');
Route::get('boards/{board}/tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth')->name('tasks.edit');
Route::put('boards/{board}/tasks/{task}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');
Route::delete('boards/{board}/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth')->name('tasks.destroy');


// Route::resource('boards', BoardController::class);

Route::resource("/boards/{board}/tasks", TaskController::class)->middleware('auth');
// Ajout de nouvelles routes pour pouvoir créer la tâche directement depuis le board : 
//Route::get('boards/{board}/tasks/create', [TaskController::class, 'createFromBoard'])->middleware('auth')->name('boards.tasks.create');
//Route::post('boards/{board}/tasks', [TaskController::class, 'storeFromBoard'])->middleware('auth')->name('boards.tasks.store');

//BOARDUSER

Route::post('boards/{board}/users', [BoardUserController::class, 'store'])->middleware('auth')->name('boards.users.store');
Route::delete('boarduser/{BoardUser}', [BoardUserController::class, 'destroy'])->middleware('auth')->name('boards.users.destroy');

//TASKUSER

Route::post('boards/{board}/tasks/{task}/users', [TaskUserController::class, 'store'])->middleware('auth')->name('tasks.users.store');
Route::delete('boarduser/{BoardUser}/taskuser/{TaskUser}', [TaskUserController::class, 'destroy'])->middleware('auth')->name('tasks.users.destroy');
