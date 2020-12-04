<?php

namespace App\Http\Controllers;

use App\Models\BoardUser;
use Illuminate\Http\Request;

class BoardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('boardUser.index',[
            'boardUser' => BoardUser::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bordUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boardUser = $request->user()->create([
            'board_id' => $request->input('board_id')
        ]);
        return redirect()->route('boardUser.show', [$boardUser]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function show(BoardUser $boardUser)
    {
        return view('boardUser.show', [
            'boardUser' => $boardUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardUser $boardUser)
    {
        return view('boardUser.update', [
            'boardUser' => $boardUser
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoardUser $boardUser)
    {
        $boardUser->update([
            'board_id' => $request->input('board_id')
        ]);
        return redirect()->route('boardUser.show', [$boardUser]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardUser $boardUser)
    {
        $boardUser->delete();
        return redirect()->route('boardUser.index');
    }
}
