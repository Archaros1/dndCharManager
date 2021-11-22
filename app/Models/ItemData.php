<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemData extends Model
{
    use HasFactory;

    protected $fillable = [
        'gear_data_id',
        'feature_list_id',
        'description_id',
    ];
}
