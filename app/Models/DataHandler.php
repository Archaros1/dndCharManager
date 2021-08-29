<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataHandler extends Model
{
    use HasFactory;

    public function sortSpellsByLevel($spells) : array
    {
        $spellsTab = [];
        foreach ($spells as $key => $spell) {
            array_push($spellsTab[$spell->level] = $spell);
        }

        return $spellsTab;
    }
}
