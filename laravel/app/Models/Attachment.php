<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
        
    /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'file',
        'filename',
        'size',
        'type',
    ];
    public function creer()
    {
        return $this->hasOne('App\Models\User', 'foreign_key');// relation 11 entre fichier et utilisateur (un fichier n'est associer qu'a un seul utilisateur)
    }
    public function appartenance()
    {
        return $this->hasOne('App\Models\Task', 'foreign_key');// relation 11 entre Fichier et tache (un fichier n'est associer qu'a une seule tache)
    }
}
