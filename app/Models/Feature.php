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
        'level',
        'description_id',
        'is_spellcasting',
        'name',
        'display_name',
        'is_action',
        'is_custom',
        'has_choice',
        'feature_list_id',
        'modify_stats',
        'stat_pack_id',
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
        'modify_stats' => 0,
        'stat_pack_id' => 0,
        'description_id' => 0,
        'is_action' => 0,
        'is_custom' => 0,
        'has_choice' => 0,
        'feature_list_id' => 0,

    ];

    public function description()
    {
        return Description::find($this->description_id);
    }

    public function list()
    {
        return $this->belongsTo(FeatureList::class);
    }

    public function hasChoice()
    {
        return $this->has_choice;
    }
}
