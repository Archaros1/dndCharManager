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
        'is_spellcaster',
        'is_custom',
        'casting_stat',
        'description_id',
        'stat_modif_id',
        'feature_list_id',
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
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_custom' => 0,
        'is_spellcaster' => 0,
        'casting_stat' => null,
        'description_id' => null,
        'feature_list_id' => null,

    ];

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function statsModif()
    {
        return $this->belongsTo(StatPack::class, 'stat_modif_id');
    }

    public function features()
    {
        return $this->featureList()->hasMany(Feature::class);
    }

    public function featureList()
    {
        return FeatureList::find($this->feature_list_id);
    }

    public function subraces()
    {
        return $this->hasMany(SubRace::class);
    }

    /**
     * Get the spell list.
     */
    public function spellList()
    {
        return $this->hasOne(SpellList::class);
    }
}
