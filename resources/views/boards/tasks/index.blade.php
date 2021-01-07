@extends('layouts.main')
@section('title', "Board's tasks")

<?php
use Illuminate\Database\Eloquent\Model;
?>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
        <p>Ici on va afficher les taches de la board : {{$board->title}}.</p>
    <div>Les taches de la board :</div>
    @foreach ($board->tasks as $task)
        <p>La task {{ $task->title }} :
            <a href="{{route('tasks.show', [$board,$task])}}">Voir</a>
            <a href="{{route('tasks.edit', [$board,$task])}}">Edit</a>
        <form method='POST' action="{{route('tasks.destroy', ["board" => $board, "task" => $task])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        </p>
    @endforeach
    </x-slot>
</x-app-layout>