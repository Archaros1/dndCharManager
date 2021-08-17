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
        'race_id',
        'sub_race_id',
        'background_id',
        'stat_pack_id',
        'creator_id',
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

    // public function background()
    // {
    //     return Background::find($this->background_id);
    // }

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
        return $this->belongsTo(SubRace::class);
    }

    // public function race()
    // {
    //     return Race::find($this->race_id);
    // }

    /**
     * Get the creator of the character.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function hitDices()
    {
        return $this->hasManyThrough(HitDice::class, ClassInvestment::class);
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

        $statPacks['race'] = $this->race->statsModif;
        $statPacks['character'] = $this->statPack;

        return $statPacks;
    }

    public function calculateStats()
    {
        $stats = [
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ];
        $statPacks = $this->statPacks();
        foreach ($statPacks as $key => $pack) {
            $stats['strength'] += $pack->strength;
            $stats['dexterity'] += $pack->dexterity;
            $stats['constitution'] += $pack->constitution;
            $stats['intelligence'] += $pack->intelligence;
            $stats['wisdom'] += $pack->wisdom;
            $stats['charisma'] += $pack->charisma;
        }
        $stats = StatPack::create($stats);

        $this->statPack = $stats;
        $this->save();
        return $stats;
    }


    public function statPack()
    {
        return StatPack::find($this->stat_pack_id);
    }

    public function getModifier(string $statName): int
    {
        $stat = $this->statPack()->$statName;
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
        $characterFeatureIds = [];

        foreach ($this->background->features as $key => $feature) {
            array_push($characterFeatureIds, $feature->id);
        }

        foreach ($this->race->features as $key => $feature) {
            array_push($characterFeatureIds, $feature->id);
        }

        foreach ($this->class_investments as $key => $investment) {
            foreach ($investment->dndClass->features as $key => $feature) {
                array_push($characterFeatureIds, $feature->id);
            }

            foreach ($investment->subClass->features as $key => $feature) {
                array_push($characterFeatureIds, $feature->id);
            }
        }

        return $characterFeatureIds;
    }

    public function featureChoices()
    {
        return $this->hasMany(SelectedFeatureChoice::class);
    }

    public function featuresWithChoices()
    {
        $characterFeatureIds = [];

        foreach ($this->background->features as $key => $feature) {
            if ($feature->hasChoice()) {
                array_push($characterFeatureIds, $feature);
            }
        }

        foreach ($this->race->features as $key => $feature) {
            if ($feature->hasChoice()) {
                array_push($characterFeatureIds, $feature);
            }
        }

        foreach ($this->race->features as $key => $feature) {
            if ($feature->hasChoice()) {
                array_push($characterFeatureIds, $feature);
            }
        }

        foreach ($this->classInvestments as $key => $investment) {
            foreach ($investment->class->features as $key => $feature) {
                if ($feature->hasChoice()) {
                    array_push($characterFeatureIds, $feature);
                }
            }

            if (!empty($investment->subClass)) {
                foreach ($investment->subClass->features as $key => $feature) {
                    if ($feature->hasChoice()) {
                        array_push($characterFeatureIds, $feature);
                    }
                }
            }
        }

        return $characterFeatureIds;
    }

    public function proficiencyBonus()
    {
        return (1+ceil($this->level/4));
    }

    public function ArmorClass()
    {
        return 8;
    }
}
