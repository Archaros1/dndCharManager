<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureChoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_spellcasting',
        'display_name',
        'is_action',
        'is_custom',
        'add_to_known_spells',
        'modify_stats',
        'description_id',
        'spell_list_id',
        'spell_id',
        'stat_pack_id',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_spellcasting' => 0,
        'is_action' => 0,
        'is_custom' => 0,
        'add_to_known_spells' => 0,
        'modify_stats' => 0,
        'description_id' => null,
        'spell_list_id' => null,
        'stat_pack_id' => null,
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

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    /**
     * Get the spell list.
     */
    public function spellList()
    {
        return $this->hasOne(SpellList::class);
    }

    public function spell()
    {
        return $this->belongsTo(Spell::class);
    }
}
