<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
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
        'is_spellcaster',
        'health',
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
     * Get the creator of the spell.
     */
    public function creator()
    {
        return $this->hasOne(User::class);
    }

    public function hitDices()
    {
        return $this->hasMany(HitDice::class);
    }

    public function calculateHP()
    {
        # code...
    }

    public function race()
    {
        return $this->hasOne(Race::class);
    }
}
