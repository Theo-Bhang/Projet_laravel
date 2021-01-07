@extends('layouts.main')
@section('title', "User's boards")
<?php
use Illuminate\Database\Eloquent\Model;
?>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boards') }}
        </h2>
       
        <p>Ici on va afficher les boards auxquels appartient l'utilisateur {{$user->name}}.</p> 
        <a href="{{route('boards.create', Board::class)}}">Creer un Board </a>
        <h3>Les boards de l'utilisateur : </h3>
            
        @foreach ($user->boards as $board)
            <p>Le board {{ $board->title }} : 
            @can('view', $board)
                <a href="{{route('boards.show', $board)}}">Voir</a>
            @endcan
            @can('update', $board)
                <a href="{{route('boards.edit', $board)}}">Edit</a>
            @endcan
            @can('delete', $board)
                <form method='POST' action="{{route('boards.destroy', $board)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
            </p>
        @endforeach
    </x-slot>
</x-app-layout>


   