<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spellcasting extends Model
{
    use HasFactory;

    protected $fillable = [
        'casting_stat',
        'know_spells',
        'prepare_spells',
    ];

    protected $attributes = [
        'know_spells' => 0,
        'prepare_spells' => 0,

    ];

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
        $spellsLevelN = $spells->where('level', '=', $level);
        // $spellsLevelN = [];
        // foreach ($spells as $key => $spell) {
        //     if ($spell->level === $level) {
        //         array_push($spellsLevelN, $spell);
        //     }
        // }

        return $spellsLevelN;
    }

    public function spellsLevelNOrLower(int $level, bool $includeCantrips = true)
    {
        $spells = $this->spells;
        if ($includeCantrips) {
            $spellsLevelN = $spells->where('level', '<=', $level);
        } else {
            $spellsLevelN = $spells->whereBetween('level', [1, $level]);
        }
        // $spellsLevelN = [];
        // foreach ($spells as $key => $spell) {
        //     if ($spell->level <= $level && ($includeCantrips || $spell->level != 0)) {
        //         array_push($spellsLevelN, $spell);
        //     }
        // }

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

    public function knownCantripsNumberLevelN(int $level): int
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

    public function knownSpellsNumberLevelN(int $level): int
    {
        if (!$this->is_spellcaster) {
            return null;
        }
        if (!is_null($this->spells_known_id)) {
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

    public function slotListPack()
    {
        return $this->belongsTo(SlotListPack::class);
    }

    public function slotLists()
    {
        return $this->slotListPack->belongsToMany(SlotList::class);
    }
}
