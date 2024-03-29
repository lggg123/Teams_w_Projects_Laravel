<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
