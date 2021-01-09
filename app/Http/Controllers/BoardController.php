<?php

namespace App\Http\Controllers;

use App\Models\{Board, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{



    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Board::class, 'board'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//L'index de board
    {
        $user = Auth::user();
        return view('boards.index', ['user' => $user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//La creation de board
    {
        //
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * Permet de stocker un nouveau board pour l'utilisateur dans la base de données
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//L'enregistrement de la board dans la bdd
    {
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', 
            'description' => 'max:4096'
        ]);
        $board = new Board(); 
        $board->title = $validatedData['title'];
        $board->description = $validatedData['description'];
        $board->user_id = Auth::user()->id; 

        $board->save(); 
        return redirect('/boards');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)//Permet de voir les boards
    {

        //$this->authorize('view', $board);

        // On récupère les ids des utilisateurs de la board : 
        $boardUsersIds = $board->users->pluck('id'); 
        $usersNotInBoard  = User::whereNotIn('id', $boardUsersIds)->get();
        return view('boards.show', ['board' => $board, 'users' => $usersNotInBoard]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)//Permet d'editer' les boards
    {
        //
        //$this->authorize('update', $board);
        return view('boards.edit', ['board' => $board]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)//Permet d'update le bdd selon des modif 
    {
        //
        //$this->authorize('update', $board);
        $validatedData = $request->validate([
                'title' => 'required|string|max:255', 
                'description' => 'max:4096'
            ]
        );
        $board->title = $validatedData['title']; 
        $board->description = $validatedData['description']; 
        $board->update(); 

        return redirect('/boards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)// Permet de supprimer un board
    {
        //
        $board->delete();
        return redirect('/boards');
    }
}
