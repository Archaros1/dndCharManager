<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpellList extends Model
{
    use HasFactory;

    public function spells()
    {
        return $this->belongsToMany(Spell::class);
    }
}
