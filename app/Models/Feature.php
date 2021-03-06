<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Descriptor\Descriptor;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'level',
        'is_spellcasting',
        'is_action',
        'activation_time',
        'duration',
        'is_custom',
        'has_choice',
        'selected_choice_amount',
        'modify_stats',
        'feature_list_id',
        'description_id',
        'stat_pack_id',
        'spell_list_id',
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
        'level' => 0,
        'modify_stats' => 0,
        'is_spellcasting' => 0,
        'is_action' => 0,
        'activation_time' => null,
        'duration' => null,
        'is_custom' => 0,
        'has_choice' => 0,
        'has_generated_choices' => 0,
        'selected_choice_amount' => null,
        'description_id' => null,
        'spell_list_id' => null,
        'stat_pack_id' => null,
        'displayed_in_ui' => 0,
    ];

    public function description()
    {
        return $this->belongsTo(Description::class);
    }

    public function list()
    {
        return $this->belongsTo(FeatureList::class);
    }

    public function hasChoice()
    {
        return $this->has_choice;
    }

    /**
     * Get the spell list.
     */
    public function spellList()
    {
        return $this->hasOne(SpellList::class);
    }

    public function statPack()
    {
        return $this->belongsTo(StatPack::class);
    }

    public function choices()
    {
        return $this->hasMany(FeatureChoice::class);
    }
}
