<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'platinum_amount',
        'gold_amount',
        'electrum_amount',
        'silver_amount',
        'copper_amount',
    ];

    protected $attributes = [
        'platinum_amount' => 0,
        'gold_amount' => 0,
        'electrum_amount' => 0,
        'silver_amount' => 0,
        'copper_amount' => 0,
    ];

    public function owner()
    {
        return $this->belongsTo(Character::class, 'inventory_id');
    }
}
