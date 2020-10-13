<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    
    /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'description',
        'date_de_publication',
        'etat',
    ];
    public function createur()
    {
        return $this->hasOne('App\Models\Utilisateur', 'foreign_key');// relation 11 entre tache et utilisateur (une tache n'est associer qu'a un seul createur)
    }
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'foreign_key'); // relation d'apartenance entre utilisateur et tache 
    }
    public function prendPart()
    {
        return $this->hasMany('App\Models\Utilisateur');      // relation 0N entre utilisateur et tache (une tache peut avoir entre 0 et N utilisateur)
    }
    
    public function categories()
    {
        return $this->hasOne('App\Models\Categorie' , 'foreign_key');// relation 11 entre tache et categorie (une categorie n'est associer qu'a un seule tache)
    }

    public function commentaires()
    {
        return $this->hasMany('App\Models\Commentaire');// relation 0N entre commentaire et tache (une tache peut avoir entre 0 et N commentaire)
    }
    public function fichiers()
    {
        return $this->hasMany('App\Models\Fichier');// relation 0N entre fichier et tache (une tache peut avoir entre 0 et N fichier)
    }
}
