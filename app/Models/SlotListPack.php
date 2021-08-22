<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotListPack extends Model
{
    use HasFactory;

    public static int $multiclassSlotListId;

    public function slotLists()
    {
        return $this->hasMany(SlotList::class);
    }

    public function slotListLevelN(int $level)
    {
        return SlotList::where('level', '=', $level)->first();
    }
}
