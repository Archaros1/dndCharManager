<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProficiencyList extends Model
{
    use HasFactory;

    protected $fillable = [
        'choice_amount',
    ];

    protected $attributes = [
        'choice_amount' => 2
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
