<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table = 'labels';
    protected $fillable = ['id','name'];

    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }
}
