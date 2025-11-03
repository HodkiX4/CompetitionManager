<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['name', 'year', 'point_for_good_answer', 'point_for_bad_answer', 'point_for_no_answer', 'available_languages'];
    /** @use HasFactory<\Database\Factories\CompetitionFactory> */
    use HasFactory;
}
