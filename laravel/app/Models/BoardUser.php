<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boardUser extends Model
{
    
    use HasFactory;

    /**
     * Les attribut qui se remplissent normaux.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * L'atribut caché mot de passe ect.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Attribut type : natif.
     *
     * @var array
     */
    protected $casts = [
    ];
    public function owner()
    {
        return $this->belongsTo('App\Models\User');// relation 01 entre board et utilisateur (une tache n'est associer qu'a un seul utilisateur)
    }
    public function taches()
    {
        return $this->hasMany('App\Models\BoardTask');// relation 0N entre tache et board (un board peut avoir plusieures taches)
    }
}