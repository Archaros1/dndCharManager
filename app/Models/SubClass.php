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
        'description',
        'is_custom',
        'is_spellcaster',
        'casting_stat',
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

    public function parentClass()
    {
        return $this->belongsTo(DndClass::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    // public function features()
    // {
    //     return $this->hasOne(FeatureList::class)->hasMany(Feature::class);
    // }

    public function features()
    {
        return $this->hasManyThrough(Feature::class, FeatureList::class);
    }
}
