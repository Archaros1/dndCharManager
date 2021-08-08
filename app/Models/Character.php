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
        'race_id',
        'background_id',
        'stat_pack_id',
        'creator_id',
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
        'is_spellcaster',
        'health',
    ];

    /**
     * Get the creator of the character.
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
        $totalHp = 0;
        $hitDices = $this->hitDices();
        foreach ($hitDices as $hitDice) {
            $totalHp += $hitDice->rolled_value;
        }
        return $totalHp;
    }

    public function race()
    {
        return $this->hasOne(Race::class);
    }
}
