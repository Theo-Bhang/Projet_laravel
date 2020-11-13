<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function ownedBoards()
    {
        return $this->hasMany(Board::class,"board_id","user_id")
                    ->using(BoardUser::class)
                    ->withPivot("id")
                    ->withTimestamps();;
    }
    public function boards()
    {
        return $this->belongsToMany(Board::class);
    }
    public function assignedTask()
    {
        return $this->hasMany(Task::class);// relation 0N entre board et utilisateur (un utilisateur appartient a plusieurs board)
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

}
