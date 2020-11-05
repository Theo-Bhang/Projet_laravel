<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'state',
    ];
    public function createur()
    {
        return $this->hasOne('App\Models\User', 'foreign_key');// relation 11 entre tache et utilisateur (une tache n'est associer qu'a un seul createur)
    }
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\User', 'foreign_key'); // relation d'apartenance entre utilisateur et tache 
    }
    public function prendPart()
    {
        return $this->hasMany('App\Models\User');// relation 0N entre utilisateur et tache (une tache peut avoir entre 0 et N utilisateur)
    }
    
    public function categories()
    {
        return $this->hasOne('App\Models\Category' , 'foreign_key');// relation 11 entre tache et categorie (une categorie n'est associer qu'a un seule tache)
    }

    public function commentaires()
    {
        return $this->hasMany('App\Models\Comment');// relation 0N entre commentaire et tache (une tache peut avoir entre 0 et N commentaire)
    }
    public function fichiers()
    {
        return $this->hasMany('App\Models\Attachment');// relation 0N entre fichier et tache (une tache peut avoir entre 0 et N fichier)
    }
}
