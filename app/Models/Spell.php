<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'has_saving_throw',
        'is_spell_attack',
        'do_damage',
        'roll',
        'casting_time',
        'school',
        'is_custom',
        'creator',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Get the tags associated with the spell.
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * Get the description associated with the spell.
     */
    public function description()
    {
        return $this->hasOne(Description::class);
    }

    /**
     * Get the creator of the spell.
     */
    public function creator()
    {
        return $this->hasOne(User::class);
    }
}
