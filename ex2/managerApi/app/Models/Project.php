<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    const PROJECT_NAME = 'name';

    const RELATION_PROJECT_ID = 'project_id';

    protected $fillable = [
        self::PROJECT_NAME
    ];

    public function todos()
    {
        return $this->belongsToMany(Todo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
