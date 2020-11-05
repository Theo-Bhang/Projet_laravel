<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board extends Model
{
    
    use HasFactory, Notifiable;

    /**
     * Les attribut qui se remplissent normaux.
     *
     * @var array
     */
    protected $fillable = [
        'title',
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
    public function prendPart()
    {
        return $this->hasMany('App\Models\Task');// relation 11 entre tache et utilisateur (une tache n'est associer qu'a un seul utilisateur)
    }
    public function creer()
    {
        return $this->hasMany('App\Models\Task');// relation 0N entre tache et utilisateur (un utilisateur peut creer plusieures taches)
    }
    public function commentaire()
    {
        return $this->hasMany('App\Models\Comment');// relation 0N entre commentaire et utilisateur (un utilisateur peut creer plusieures commentaire)
    }
    public function fichier()
    {
        return $this->hasMany('App\Models\Attachment');// relation 0N entre fichier et utilisateur (un utilisateur peut deposer plusieurs fichiers)
    }
}
