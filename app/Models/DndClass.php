<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Features;

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
        'description_id',
        'subClassObtentionLevel',
        'hitdice',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

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

    // public function features()
    // {
    //     return $this->hasOne(FeatureList::class)->hasMany(Feature::class);
    // }

    public function features()
    {
        return $this->hasManyThrough(Feature::class, FeatureList::class);
    }

    public function subClasses()
    {
        return $this->hasMany(SubClass::class, 'class_id');
    }

    public function subClassLevel(): int
    {
        $level = 0;
        switch ($this->name) {
            case 'barbarian':
            case 'bard':
            case 'fighter':
            case 'monk':
            case 'paladin':
            case 'ranger':
            case 'rogue':
                $level = 3;
                break;

            case 'druid':
            case 'wizard':
                $level = 2;
                break;

            case 'cleric':
            case 'sorcerer':
            case 'warlock':
                $level = 1;
                break;

            default:
                # code...
                break;
        }
        return $level;
    }

    public function archetypeAmount(): int
    {
        $amount = 0;
        $archetypes = [];
        $subclasses = SubClass::where('class_id', '=', $this->id);
        foreach ($subclasses as $subclass) {
            if (!in_array($subclass->archetype, $archetypes)) {
                $amount++;
                array_push($archetypes, $subclass->archetype);
            }
        }
        return $amount;
    }
}
