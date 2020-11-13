<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The users that belong to the task
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\Board');
    }
    public function owner()
    {
        return $this->belongsTo('App\Models\User');// relation 01 entre board et utilisateur (une tache n'est associer qu'a un seul utilisateur)
    }
    public function taches()
    {
        return $this->hasMany('App\Models\BoardTask');// relation 0N entre tache et board (un board peut avoir plusieures taches)
    }
}