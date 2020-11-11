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
    public function appartient()
    {
        return $this->belongsTo('App\Models\Board', 'foreign_key', 'other_key');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'task_user_table', 'user_id', 'task_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'foreign_key', 'local_key');
    }
    public function categories()
    {
        return $this->hasOne('App\Models\Category', 'foreign_key', 'local_key');
    }
    public function attachment()
    {
        return $this->hasMany('App\Models\Attachment', 'foreign_key', 'local_key');
    }
    
}
