<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'archetype',
        'class_id',
        'features',
        'is_custom',
        'is_spellcaster',
        'casting_stat',
    ];

    protected $attributes = [

    ];

    public function parentClass()
    {
        return $this->belongsTo(DndClass::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function features()
    {
        return $this->featureList()->hasMany(Feature::class);
    }

    public function featureList()
    {
        return FeatureList::find($this->feature_list_id);
    }

    /**
     * Get the spell list.
     */
    public function spellList()
    {
        return $this->hasOne(SpellList::class);
    }
}
