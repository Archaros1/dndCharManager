<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'spellsKnownCount',
        'cantripsKnownCount',
        'race_id',
        'sub_race_id',
        'background_id',
        'stat_pack_id',
        'final_stat_pack_id',
        'creator_id',
        'slot_list_long_rest_id',
        'slot_list_short_rest_id',
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
    protected $casts = [
        'is_spellcaster',
        'health',
    ];

    protected $attributes = [];

    public function background()
    {
        return $this->belongsTo(Background::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function subrace()
    {
        return $this->belongsTo(SubRace::class, 'sub_race_id');
    }

    /**
     * Get the creator of the character.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function actual()
    {
        return $this->hasOne(ActualCharacter::class);
    }

    public function hitDices()
    {
        return $this->hasManyThrough(HitDice::class, ClassInvestment::class);
    }

    public function numberhitDicesWithNFaces(int $faceNumber)
    {
        $hitdices = $this->hitDices;
        $result = 0;
        foreach ($hitdices as $key => $hitdice) {
            if ($hitdice->max_value === $faceNumber) {
                $result++;
            }
        }
        return $result;
    }

    public function calculateHP()
    {
        $totalHp = 0;
        $hitDices = $this->hitDices;
        foreach ($hitDices as $hitDice) {
            $plusHP = $hitDice->rolled_value + $this->getModifier('constitution');
            $totalHp += ($plusHP > 0 ? $plusHP : 1);
        }
        return $totalHp;
    }

    public function statPacks()
    {
        $statPacks = [];

        array_push($statPacks, $this->statPack, $this->race->statsModif);
        if (!is_null($this->sub_race_id)) {
            array_push($statPacks, $this->subrace->statsModif);
        }
        foreach ($this->features() as $key => $feature) {
            if (!is_null($feature->stat_pack_id)) {
                array_push($statPacks, $feature->statPack);
            }
        }

        foreach ($this->featureChoices as $key => $choice) {
            if (!is_null($choice->stat_pack_id)) {
                array_push($statPacks, $feature->statPack);
            }
        }

        return $statPacks;
    }

    public function statPack()
    {
        return $this->belongsTo(StatPack::class, 'stat_pack_id');
    }

    public function finalStatPack()
    {
        return $this->belongsTo(StatPack::class, 'final_stat_pack_id');
    }

    public function calculateStats()
    {
        $statsTab = [
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ];
        $statPacks = $this->statPacks();
        foreach ($statPacks as $key => $pack) {
            $statsTab['strength'] += $pack->strength;
            $statsTab['dexterity'] += $pack->dexterity;
            $statsTab['constitution'] += $pack->constitution;
            $statsTab['intelligence'] += $pack->intelligence;
            $statsTab['wisdom'] += $pack->wisdom;
            $statsTab['charisma'] += $pack->charisma;
        }

        if (is_null($this->final_stat_pack_id)) {
            $stats = StatPack::create($statsTab);
            $this->final_stat_pack_id = $stats->id;
        } else {
            $stats = StatPack::find($this->final_stat_pack_id);
            $stats->update($statsTab);
        }
        $this->save();
        return $stats;
    }

    public function getModifier(string $statName): int
    {
        $stat = $this->finalStatPack->$statName;
        $modifier = floor(($stat - 10) / 2);

        return (int) $modifier;
    }

    public function classInvestments()
    {
        return $this->hasMany(ClassInvestment::class);
    }

    public function investedLevel()
    {
        $investments = $this->classInvestments;

        $investedLevel = 0;
        foreach ($investments as $key => $investment) {
            $investedLevel += $investment->level;
        }

        return $investedLevel;
    }

    public function mainClass()
    {
        return $this->classInvestments[0]->class();
    }

    public function features()
    {
        $characterFeatures = [];

        $characterFeatures = $this->getFeaturesOf($this->background, $characterFeatures);
        $characterFeatures = $this->getFeaturesOf($this->race, $characterFeatures);
        $characterFeatures = $this->getFeaturesOf($this->subrace, $characterFeatures);


        foreach ($this->classInvestments as $key => $investment) {
            $characterFeatures = $this->getFeaturesOf($investment->class, $characterFeatures);
            $characterFeatures = $this->getFeaturesOf($investment->subClass, $characterFeatures);
        }

        return $characterFeatures;
    }

    public function featureChoices()
    {
        return $this->hasMany(SelectedFeatureChoice::class);
    }

    public function featuresWithChoices()
    {
        $characterFeatures = [];

        foreach ($this->background->features as $key => $feature) {
            if ($feature->hasChoice() && $feature->level <= $this->level) {
                array_push($characterFeatures, $feature);
            }
        }

        foreach ($this->race->features as $key => $feature) {
            if ($feature->hasChoice() && $feature->level <= $this->level) {
                array_push($characterFeatures, $feature);
            }
        }

        if (!empty($this->subrace)) {
            foreach ($this->subrace->features as $key => $feature) {
                if ($feature->hasChoice() && $feature->level <= $this->level) {
                    array_push($characterFeatures, $feature);
                }
            }
        }


        foreach ($this->classInvestments as $key => $investment) {
            foreach ($investment->class->features as $key => $feature) {
                if ($feature->hasChoice() && $feature->level <= $this->level) {
                    array_push($characterFeatures, $feature);
                }
            }

            if (!empty($investment->subClass)) {
                foreach ($investment->subClass->features as $key => $feature) {
                    if ($feature->hasChoice() && $feature->level <= $this->level) {
                        array_push($characterFeatures, $feature);
                    }
                }
            }
        }

        return $characterFeatures;
    }

    public function featuresWithSpellcasting()
    {
        $characterFeature = [];

        foreach ($this->background->features as $key => $feature) {
            if ($feature->is_spellcasting && $feature->level <= $this->level) {
                array_push($characterFeature, $feature);
            }
        }

        foreach ($this->race->features as $key => $feature) {
            if ($feature->is_spellcasting && $feature->level <= $this->level) {
                array_push($characterFeature, $feature);
            }
        }

        foreach ($this->race->features as $key => $feature) {
            if ($feature->is_spellcasting && $feature->level <= $this->level) {
                array_push($characterFeature, $feature);
            }
        }

        foreach ($this->classInvestments as $key => $investment) {
            foreach ($investment->class->features as $key => $feature) {
                if ($feature->is_spellcasting && $feature->level <= $this->level) {
                    array_push($characterFeature, $feature);
                }
            }

            if (!empty($investment->subClass)) {
                foreach ($investment->subClass->features as $key => $feature) {
                    if ($feature->is_spellcasting && $feature->level <= $this->level) {
                        array_push($characterFeature, $feature);
                    }
                }
            }
        }

        return $characterFeature;
    }

    public function featureChoicesWithSpellcasting()
    {
        $choicesWithSpellcasting = [];
        $choices = $this->featureChoices;
        foreach ($choices as $key => $choice) {
            if ($choice->is_spellcasting) {
                array_push($choicesWithSpellcasting, $choice);
            }
        }
        return $choicesWithSpellcasting;
    }

    public function traits()
    {
        $features = collect($this->features());
        $traits = $features->where('is_action', '=', 0);
        return $traits;
    }

    public function actions()
    {
        $features = collect($this->features());
        $actions = $features->where('is_action', '=', 1);
        return $actions;
    }

    public function proficiencyBonus()
    {
        return (1 + ceil($this->level / 4));
    }

    public function ArmorClass()
    {
        return 10 + $this->getModifier('dexterity');
    }

    public function isSpellcaster()
    {
        $isSpellcaster = false;

        $investments = $this->classInvestments;
        foreach ($investments as $key => $investment) {
            if ($investment->class->is_spellcaster || (!is_null($investment->subclass) && $investment->subclass->is_spellcaster)) {
                $isSpellcaster = true;
            }
        }

        if ($this->race->is_spellcaster || $this->subrace->is_spellcaster || count($this->featureChoicesWithSpellcasting()) !== 0 || count($this->featuresWithSpellcasting()) !== 0) {
            $isSpellcaster = true;
        }

        return $isSpellcaster;
    }

    public function isMulticlass()
    {
        return count($this->classInvestments) > 1;
    }

    public function getFeaturesOf($item, array $characterFeatures)
    {
        if (!empty($item) && !is_null($item->feature_list_id)) {
            foreach ($item->features as $key => $feature) {
                if ($feature->level <= $this->level) {
                    array_push($characterFeatures, $feature);
                }
            }
        }

        return $characterFeatures;
    }

    /**
     * If character has many spellcaster classes, except warlock
     */
    public function isMulticaster()
    {
        if ($this->isMulticlass() === false) {
            return false;
        }

        $casterClassesCount = 0;
        foreach ($this->classInvestments as $key => $investment) {
            if ($investment->class->is_spellcaster === 1 && $investment->class->name !== 'warlock') {
                $casterClassesCount++;
            }
        }

        return $casterClassesCount > 1;
    }

    public function levelForMulticlassSlotList(): int
    {
        $level = 0;
        foreach ($this->classInvestments as $key => $investment) {
            switch ($investment->class->name) {
                case 'bard':
                case 'cleric':
                case 'druid':
                case 'sorcerer':
                case 'wizard':
                    $level += $investment->level;
                    break;
                case 'paladin':
                case 'ranger':
                    $level += floor($investment->level / 2);
                    break;
                case 'artificier':
                    $level += ceil($investment->level / 2);
                    break;
                default:
                    # code...
                    break;
            }
            if (isset($investment->subclass)) {
                switch ($investment->subclass->name) {
                    case 'eldritch knight':
                    case 'arcane trickster':
                        $level += floor($investment->level / 3);
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }

        return $level;
    }

    public function slots()
    {
        $slotsShortRest = $this->slotListShortRest ?? collect();
        $slotsLongRest = $this->slotListLongRest ?? collect();

        $slots = collect();
        $slots = $slots->merge($slotsShortRest);
        $slots = $slots->merge($slotsLongRest);

        return $slots;
    }

    public function getSlotListShortRest()
    {
        if ($this->isWarlock()) {
            $investment = $this->getWarlockInvestment();
            $warlockSlotList = SlotListPack::where('name', '=', 'warlock')->first()->slotListLevelN($investment->level);
        }
        return $warlockSlotList ?? null;
    }

    public function slotListShortRest()
    {
        return $this->belongsTo(SlotList::class, 'slot_list_short_rest_id');
    }

    public function getSlotListLongRest()
    {
        if ($this->isMulticaster()) {
            $level = $this->levelForMulticlassSlotList();
            $slotList = SlotListPack::find(SlotListPack::$multiclassSlotListId)->slotListLevelN($level);
        } else {
            $packId = 0;
            foreach ($this->classInvestments as $key => $investment) {
                if ($investment->class->is_spellcaster && !is_null($investment->class->spellcasting->slot_list_pack_id)) {
                    $packId = $investment->class->spellcasting->slot_list_pack_id;
                    $level = $investment->level;
                    break;
                } elseif (isset($investment->subclass) && $investment->subclass->is_spellcaster && !is_null($investment->subclass->slot_list_pack_id)) {
                    $packId = $investment->subclass->spellcasting->slot_list_pack_id;
                    $level = $investment->level;
                    break;
                }
            }
            $slotList = null;
            if (0 !== $packId) {
                $slotList = SlotListPack::find($packId)->slotListLevelN($level);
            }
        }

        return $slotList;
    }

    public function slotListLongRest()
    {
        return $this->belongsTo(SlotList::class, 'slot_list_long_rest_id');
    }

    public function isWarlock(): bool
    {
        $result = false;
        foreach ($this->classInvestments as $investment) {
            if ($investment->class->name === 'warlock') {
                $result = true;
            }
        }

        return $result;
    }

    public function getWarlockInvestment()
    {
        $result = null;
        foreach ($this->classInvestments as $investment) {
            if ($investment->class->name === 'warlock') {
                $result = $investment;
            }
        }
        return $result;
    }

    public function knownSpells()
    {
        $spells = [];
        $investments = $this->classInvestments;
        foreach ($investments as $key => $investment) {
            if (!is_null($investment->known_spell_list_id)) {
                foreach ($investment->knownSpells as $key => $knownSpell) {
                    array_push($spells, $knownSpell);
                }
            }
        }

        return $spells;
    }

    public function spellsReadyToUse()
    {
        $spells = collect();
        foreach ($this->classInvestments as $investment) {
            if ($investment->class->spellcasting->prepare_spells) {
                $spells = $spells->merge($investment->preparedSpells);
                $spells = $spells->merge($investment->knownSpellsLevelN(0));
            } else {
                $spells = $spells->merge($investment->knownSpells);
            }
        }
        return $spells->unique();
    }

    public function hasSpellsPrepared() : bool
    {
        $result = true;
        $investments = $this->classInvestments;
        foreach ($investments as $key => $investment) {
            if (
                $investment->class->is_spellcaster
                && !is_null($investment->class->spellcasting_id)
                && $investment->class->spellcasting->prepare_spells
                && empty($investment->preparedSpellList->spells->all())
            ) {
                $result = false;
                break;
            }
        }
        return $result;
    }

    public function prepareSpells() : bool
    {
        $result = false;
        $investments = $this->classInvestments;
        foreach ($investments as $key => $investment) {
            if (
                !is_null($investment->class->spellcasting_id)
                && $investment->class->spellcasting->prepare_spells
            ) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    public function investmentMissingPreparedSpells()
    {
        $result = null;
        $investments = $this->classInvestments;
        foreach ($investments as $key => $investment) {
            if (
                $investment->class->is_spellcaster
                && !is_null($investment->class->spellcasting_id)
                && $investment->class->spellcasting->prepare_spells
                && empty($investment->preparedSpellList->spells->items)
            ) {
                $result = $investment;
                break;
            }
        }
        return $result;
    }
}
