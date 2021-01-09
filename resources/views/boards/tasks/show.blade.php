@extends('layouts.main')
@section('title', "Board's tasks")

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<?php
use Illuminate\Database\Eloquent\Model;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
        <p>Ici on va afficher les infos de la tache {{$task->title}}.</p>
    <p>{{$task->description}}</p>
    <p>A faire pour le {{$task->due_date}}</p>
    <p>status {{$task->state}}</p>
    <div>Les utilisateurs assignés à la taches : </div>
    @foreach ($task->assignedUsers as $users)
        <p>{{$user->email}} : {{$user->name}}</p>
    @endforeach
    <!--<form action="" method="post">
        <p>Laissez un commentaire :</p>
    
        <input type="textarea" name="comment" id="comment"/>
        <button type="submit" >Poster</button>
    </form>-->
        
    </x-slot>

</x-app-layout>