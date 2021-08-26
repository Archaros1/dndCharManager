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
        'prepare_spells',
        'subClassObtentionLevel',
        'hitdice',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_spellcaster' => 0,
    ];

    /**
     * Get the spell list.
     */
    // public function spellList()
    // {
    //     return $this->belongsTo(SpellList::class);
    // }

    // public function spells()
    // {
    //     return $this->spellList->belongsToMany(Spell::class);
    // }

    public function spellcasting()
    {
        return $this->belongsTo(Spellcasting::class);
    }

    public function spellList()
    {
        return $this->spellcasting->belongsTo(SpellList::class);
    }

    public function spells()
    {
        return $this->spellcasting->spellList->belongsToMany(Spell::class);
    }

    public function proficiencyList()
    {
        return $this->belongsTo(ProficiencyList::class);
    }

    public function proficiencies()
    {
        return $this->proficiencyList->belongsToMany(Skill::class);
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

    public function spellsLevelNOrLower(int $level, bool $includeCantrips = true)
    {
        $spells = $this->spells;
        $spellsLevelN = [];
        foreach ($spells as $key => $spell) {
            if ($spell->level <= $level && ($includeCantrips || $spell->level != 0)) {
                array_push($spellsLevelN, $spell);
            }
        }

        return $spellsLevelN;
    }

    public function knownCantripsNumbers()
    {
        if ($this->is_spellcaster) {
            return $this->belongsTo(EvolvingNumber::class, 'cantrips_known_id');
        }
        return null;
    }

    public function knownSpellsNumbers()
    {
        if ($this->is_spellcaster) {
            return $this->belongsTo(EvolvingNumber::class, 'spells_known_id');
        }
        return null;
    }

    public function knownCantripsNumberLevelN(int $level)
    {
        if (!$this->is_spellcaster) {
            return null;
        }
        if (!is_null($this->cantrips_known_id)) {
            $level = 'level_' . $level;
            return $this->knownCantripsNumbers->$level;
        }
        return null;
    }

    public function knownSpellsNumberLevelN(int $level)
    {
        if (!$this->is_spellcaster) {
            return null;
        }
        if (!is_null($this->spellcasting->spells_known_id)) {
            $level = 'level_' . $level;
            return $this->knownSpellsNumbers->$level;
        }
        switch ($this->name) {
            case 'wizard':
                return 6 + 2 * ($level - 1);
                break;
            default:
                return null;
                break;
        }
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

    public function slotListPack()
    {
        return $this->belongsTo(SlotListPack::class);
    }

    public function slotLists()
    {
        return $this->spellcasting->slotListPack->belongsToMany(SlotList::class);
    }
}
