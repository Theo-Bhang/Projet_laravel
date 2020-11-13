<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class board extends Model
{
    
    use HasFactory;

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
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');// relation 01 entre board et utilisateur (un board n'est associer qu'a un seul utilisateur)
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);// relation 0N entre board et utilisateur (un utilisateur peut creer plusieurs board)
    }
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->using(BoardUser::class)
                    ->withPivot("id")
                    ->withTimestamps();// relation 0N entre board et utilisateur (un utilisateur appartient a plusieurs board)
    }
}
