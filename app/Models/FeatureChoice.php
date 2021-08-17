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
        'description_id',
        'is_spellcasting',
        'name',
        'display_name',
        'is_action',
        'is_custom',
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
}
