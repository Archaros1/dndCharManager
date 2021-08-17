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
        'spell_list_id',
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
     * Get the spell list.
     */
    public function spellList()
    {
        return $this->belongsTo(SpellList::class);
    }

    public function spells()
    {
        return $this->spellList->belongsToMany(Spell::class);

    }

    public function spellsLevelN(int $level)
    {
        $spells = $this->spells;
        $spellsLevelN = [];
        foreach ($spells as $key => $spell) {
            if ($spell->level === $level) {
                array_push($spellsLevelN, $spell);
            }
        }

        return $spellsLevelN;
    }

    public function spellsLevelNOrLower(int $level)
    {
        $spells = $this->spells;
        $spellsLevelN = [];
        foreach ($spells as $key => $spell) {
            if ($spell->level <= $level) {
                array_push($spellsLevelN, $spell);
            }
        }

        return $spellsLevelN;
    }

    public function description()
    {
        return Description::find($this->description_id);
    }

    public function stats()
    {
        return $this->hasOne(StatPack::class);
    }

    public function features()
    {
        return $this->featureList()->hasMany(Feature::class);
    }

    public function featureList()
    {
        return FeatureList::find($this->feature_list_id);
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
