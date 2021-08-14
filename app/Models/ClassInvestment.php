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

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    // public function class()
    // {
    //     return DndClass::find($this->class_id);
    // }

    // public function subclass()
    // {
    //     return SubClass::find($this->subclass_id);
    // }

    public function class()
    {
        return $this->belongsTo(DndClass::class);
    }

    public function subclass()
    {
        return $this->belongsTo(SubClass::class);
    }
}
