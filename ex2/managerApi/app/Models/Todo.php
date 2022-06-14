<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    const DESCRIPTION = 'description';
    const STATUS = 'status';
    const TRACK_COUNTER = 'counter';
    const IS_DONE = 'is_done';

    protected $fillable = [
        self::DESCRIPTION,
        self::STATUS,
        self::TRACK_COUNTER,
        self::IS_DONE
    ];

    public function project()
    {
        $this->hasOne(Project::class);
    }
}
