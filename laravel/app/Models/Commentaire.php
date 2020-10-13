<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
        /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'texte',
        'creer_le',
        'publier_le',
    ];
    public function creer()
    {
        return $this->hasOne('App\Models\Utilisateur', 'foreign_key');// relation 11 entre commentaire et utilisateur (un commentaire n'est associer qu'a un seul utilisateur)
    }
    public function appartenance()
    {
        return $this->hasOne('App\Models\Tache', 'foreign_key');// relation 11 entre commentaire et tache (un commentaire n'est associer qu'a une seule tache)
    }
}
