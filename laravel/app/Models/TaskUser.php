<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The users that belong to the task
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\Task');
    }
}