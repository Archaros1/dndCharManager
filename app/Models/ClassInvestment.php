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
        'stolen_spells_count',
        'known_spell_list_id',
        'prepared_spell_list_id',
    ];

    protected $attributes = [
        'spells_known_count' => 0,
        'cantrips_known_count' => 0,
        'stolen_spells_count' => 0,
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

    public function hasMissingSpell()
    {
        return
            $this->spells_known_count < ($this->class->knownSpellsNumberLevelN($this->level) + $this->stolen_spells_count)
            ? ($this->class->knownSpellsNumberLevelN($this->level) + $this->stolen_spells_count) - $this->spells_known_count
            : 0;
    }

    public function hasMissingCantrip()
    {
        return
            $this->cantrips_known_count < $this->class->knownCantripsNumberLevelN($this->level)
            ? $this->class->knownCantripsNumberLevelN($this->level) - $this->cantrips_known_count
            : 0;
    }

    public function slotList()
    {
        return $this->class->spellcasting->slotListPack->slotListLevelN($this->level);
    }

    public function highestSlot()
    {
        $slotList = $this->slotList();
        for ($i=9; $i >= 0; $i--) {
            $level = 'level_'.$i;
            if ($slotList->$level != 0) {
                return (int) $i;
            }
        }
        return null;
    }

    public function knownSpellList()
    {
        return $this->belongsTo(SpellList::class, 'known_spell_list_id');
    }

    public function knownSpells()
    {
        return $this->knownSpellList->belongsToMany(Spell::class);
    }

    public function preparedSpellList()
    {
        return $this->belongsTo(SpellList::class, 'prepared_spell_list_id');
    }

    public function preparedSpellsCount()
    {
        if ($this->class->spellcasting->prepare_spells == 0) {
            return null;
        }

        $count = $this->character->level + $this->character->getModifier($this->class->spellcasting->casting_stat);
        return $count < 1 ? 1 : $count;
    }

    public function spellDC()
    {
        return 8 + $this->character->proficiencyBonus() + $this->character->getModifier($this->class->spellcasting->casting_stat);
    }

    public function spellAttackModifier()
    {
        return $this->character->proficiencyBonus() + $this->character->getModifier($this->class->spellcasting->casting_stat);

    }
}
