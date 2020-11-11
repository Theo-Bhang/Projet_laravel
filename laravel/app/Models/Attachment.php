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
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'foreign_key', 'other_key');
    }
    public function task()
    {
        return $this->hasOne('App\Models\Task', 'foreign_key', 'local_key');
    }
}
