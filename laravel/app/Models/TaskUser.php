<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskUser extends Pivot
{
    use HasFactory;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    public function user()
    {
        return $this->belongsTo(User::class);// relation 11 entre commentaire et utilisateur (un commentaire n'est associer qu'a un seul utilisateur)
    }
    public function task()
    {
        return $this->belongsTo(Task::class);// relation 11 entre commentaire et tache (un commentaire n'est associer qu'a une seule tache)
    }
}
