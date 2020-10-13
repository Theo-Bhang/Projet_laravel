<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model // le model etendue Categorie
{
    use HasFactory;
        /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'nom',// Permet de remplir le nom pour la classe categorie
    ];
    public function possesion()
    {
        return $this->hasMany('App\Models\Tache');// relation 0N entre categorie et tache (une tache peut avoir entre 0 et N categories)
    }
}
