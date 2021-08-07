<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Descriptor\Descriptor;

class DndClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_custom',
        'is_spellcaster',
        'casting_stat',
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
    public function spellList()
    {
        return $this->hasMany(Spell::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function stats()
    {
        return $this->hasOne(StatPack::class);
    }

    public function hitDice()
    {
        return $this->hasOne(HitDice::class);
    }
}
