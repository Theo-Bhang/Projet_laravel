<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model // le model etendue Categorie
{
    use HasFactory;
        /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'name',// Permet de remplir le nom pour la classe categorie
    ];
    public function possesion()
    {
        return $this->hasMany('App\Models\Task');// relation 0N entre categorie et tache (une tache peut avoir entre 0 et N categories)
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);// relation 0N entre categorie et tache (une tache peut avoir entre 0 et N categories)
    }
}
