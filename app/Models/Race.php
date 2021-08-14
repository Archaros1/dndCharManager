<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description_id',
        'stat_modif_id',
        'is_custom',
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

    public function statsModif()
    {
        return $this->hasOne(StatPack::class);
    }

    // public function features()
    // {
    //     return $this->hasOne(FeatureList::class)->hasMany(Feature::class);
    // }

    public function features()
    {
        return $this->featureList()->hasMany(Feature::class);
    }

    public function featureList()
    {
        return FeatureList::find($this->feature_list_id);
    }
}
