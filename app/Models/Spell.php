<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
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
        'range',
        'components',
        'material',
        'concentration',
        'has_saving_throw',
        'saving_throw_attribute',
        'is_spell_attack',
        'attack_type',
        'do_damage',
        'roll',
        'casting_time',
        'school',
        'ritual',
        'is_custom',
        'creator',
        'enpowerable',
        'description_id',
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
        'components' => 'VSM',
        'material' => null,
        'concentration' => 0,
        'has_saving_throw' => 0,
        'is_spell_attack' => 0,
        'attack_type' => null,
        'do_damage' => 0,
        'description_id' => null,
        'roll' => null,
        'casting_time' => null,
        'ritual' => 0,
        'is_custom' => 0,
        'enpowerable' => 0,
        'description_id' => null,

    ];

    /**
     * Get the tags associated with the spell.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the spell lists associated with the spell.
     */
    public function spellLists()
    {
        return $this->belongsToMany(SpellList::class);
    }

    /**
     * Get the description associated with the spell.
     */
    public function description()
    {
        return $this->belongsTo(Description::class) ?? null;
    }

    /**
     * Get the creator of the spell if the spell is custom.
     */
    public function creator()
    {
        return $this->is_custom ? $this->hasOne(User::class) : null;
    }
}
