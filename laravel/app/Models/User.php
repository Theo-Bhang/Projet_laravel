<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Utilisateur as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attribut qui se remplissent normaux.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'pseudo',
        'email',
        'mdp',
    ];

    /**
     * L'atribut caché mot de passe ect.
     *
     * @var array
     */
    protected $hidden = [
        'mdp',
        'remember_token',
    ];

    /**
     * Attribut type : natif.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function prendPart()
    {
        return $this->hasMany('App\Models\Tache');// relation 11 entre tache et utilisateur (une tache n'est associer qu'a un seul utilisateur)
    }
    public function creer()
    {
        return $this->hasMany('App\Models\Tache');// relation 0N entre tache et utilisateur (un utilisateur peut creer plusieures taches)
    }
    public function commentaire()
    {
        return $this->hasMany('App\Models\Commentaire');// relation 0N entre commentaire et utilisateur (un utilisateur peut creer plusieures commentaire)
    }
    public function fichier()
    {
        return $this->hasMany('App\Models\Fichier');// relation 0N entre fichier et utilisateur (un utilisateur peut deposer plusieurs fichiers)
    }
}
