@extends('layouts.main')

@section('title', "THE board")

<link rel="stylesheet" href="{{ mix('css/app.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boards') }}
        </h2>
        <h3>Bienvenu dans le board : {{$board->title}}</h3>
        <h4>Description : {{$board->description}} </h4>
        <h5>Participants au board :</h5>
        @foreach ($board->users as $user)
            <p>{{ $user->name }} : {{ $user->email }} 
                <form method="POST" action="{{route('boards.users.destroy', $user->pivot->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </p> 
        @endforeach
        <form method="POST" action="{{route('boards.users.store', $board)}}">
            @csrf
            <label for="user_id"></label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}: {{$user->email}}</option>
                @endforeach
            </select>
            <button type="submit">Ajouter</button>
        </form>
    
        <br/>
        <a href="{{route('tasks.index', $board)}}">Voir les tâches</a>
        <br/>
        <a href="{{route('tasks.create', $board)}}">Ajouter une tâche</a>
        
    </x-slot>

</x-app-layout>
