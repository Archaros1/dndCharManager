<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_data_id',
    ];

    public function data()
    {
        return $this->belongsTo(ItemData::class, 'item_data_id');
    }
}
