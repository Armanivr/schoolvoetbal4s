<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'teams', 'admin', 'location'];

    protected $casts = [
        'teams' => 'array', 
    ];
}
