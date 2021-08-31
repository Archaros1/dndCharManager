<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitDice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'max_value',
        'rolled_value',
        'rolled_short_rest',
        'class_investment_id',
    ];

    protected $attributes = [
        'rolled_short_rest' => 0,
    ];


    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
