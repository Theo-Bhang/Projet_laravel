<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Utilisateur as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attribut qui se remplissent normaux.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * L'atribut caché mot de passe ect.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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
    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'foreign_key', 'local_key');
    }
    public function attachment()
    {
        return $this->hasMany('App\Models\Attachment', 'foreign_key', 'local_key');
    }
    public function owner()
    {
        return $this->hasMany('App\Models\Board', 'foreign_key', 'local_key');
    }
    public function boardUser()
    {
        return $this->hasMany('App\Models\BoardUser', 'foreign_key', 'local_key');
    }
    public function taskUser()
    {
        return $this->hasMany('App\Models\Task', 'foreign_key', 'local_key');
    }
}
