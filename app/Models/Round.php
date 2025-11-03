<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = ['question', 'user_id', 'competition_id'];
    /** @use HasFactory<\Database\Factories\RoundFactory> */
    use HasFactory;
}
