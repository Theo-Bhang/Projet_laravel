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
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
    public function assignedUsers()
    {
        return $this->belongsToMany(User::class)
                    ->using(TaskUser::class)
                    ->withPivot("id")
                    ->withTimestamps();// relation 0N entre board et utilisateur (un utilisateur appartient a plusieurs board)
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
    public function participants()
    {
        return $this->hasManyThrough(User::class,BoardUser::class,"board_id","id");// relation 0N entre board et utilisateur (un utilisateur appartient a plusieurs board)
    }
    
}
