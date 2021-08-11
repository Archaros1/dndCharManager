<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInvestment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'character_id',
        'class_id',
        'subclass_id',
        'level',
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

    public function dndClass()
    {
        return $this->hasOne(DndClass::class);
    }

    public function subClass()
    {
        return $this->hasOne(SubClass::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
