<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInvestment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'character_id',
        'class_id',
        'subclass_id',
        'level',
        'known_spell_list_id',
    ];

    protected $attributes = [
        'known_spell_list_id' => null,
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function class()
    {
        return $this->belongsTo(DndClass::class);
    }

    public function subclass()
    {
        return $this->belongsTo(SubClass::class);
    }

    public function hitDices()
    {
        return $this->hasMany(HitDice::class);
    }

    public function hasMissingHitDice()
    {
        return count($this->hitDices) < $this->level;
    }
}
