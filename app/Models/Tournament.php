<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'teams', 'admin', 'winner', 'start_date']; 

    protected $casts = [
        'teams' => 'array', 
    ];
}
