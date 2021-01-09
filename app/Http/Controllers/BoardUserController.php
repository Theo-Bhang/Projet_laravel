<?php

namespace App\Http\Controllers;
use App\Models\{Board, BoardUser};
use Illuminate\Http\Request;

class BoardUserController extends Controller
{
    //

    /**
     * Ajoute un utilisateur dans un board en utilisant le modèle pivot BoardUser
     *
     * @param Board $board le board pour lequel on ajoute l'utilisateur
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Board $board) {//Permet d'associer les user et les boards
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $boardUser = new Boarduser(); 
        $boardUser->user_id = $validatedData['user_id']; 
        $boardUser->board_id = $board->id; 
        $boardUser->save(); 
        return redirect(route('boards.show', $board));
    }


    public function destroy(BoardUser $boardUser) { //Permet de detruire dans la bdd les boards associés aux users
        $board = $boardUser->board;
        $boardUser->delete();
        return redirect(route('boards.show', $board));
    }

}
