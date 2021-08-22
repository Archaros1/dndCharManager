<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotList extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_level',
        'level_1',
        'level_2',
        'level_3',
        'level_4',
        'level_5',
        'level_6',
        'level_7',
        'level_8',
        'level_9',
        'owner_id',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'class_level' => null,
        'level_1' => 0,
        'level_2' => 0,
        'level_3' => 0,
        'level_4' => 0,
        'level_5' => 0,
        'level_6' => 0,
        'level_7' => 0,
        'level_8' => 0,
        'level_9' => 0,
        'owner_id' => null,
    ];

    public function owner()
    {
        return $this->belongsTo(SlotListPack::class);
    }
}
