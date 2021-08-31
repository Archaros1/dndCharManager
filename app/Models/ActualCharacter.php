<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualCharacter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'left_health',
        'character_id',
        'left_slot_list_long_rest_id',
        'left_slot_list_short_rest_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function slots()
    {
        $slotsShortRest = $this->leftSlotListShortRest ?? collect();
        $slotsLongRest = $this->leftSlotListLongRest ?? collect();

        $slots = collect();
        $slots = $slots->merge($slotsShortRest);
        $slots = $slots->merge($slotsLongRest);

        return $slots;
    }

    public function leftSlotListShortRest()
    {
        return $this->belongsTo(SlotList::class, 'left_slot_list_short_rest_id');
    }

    public function leftSlotListLongRest()
    {
        return $this->belongsTo(SlotList::class, 'left_slot_list_long_rest_id');
    }

    public function hasUsableSlot(int $spellLevel)
    {
        $result = 0;
        $leftSlots = $this->slots();
        if ($leftSlots['level_' . $spellLevel] > 0) {
            // empowerable ?
            $result = $spellLevel;
        } else {
            for ($i = $spellLevel + 1; $i <= 9; $i++) {
                if ($leftSlots['level_' . $i] > 0) {
                    // you gonna use a more powerful slot, continue ? y/n
                    $result = $i;
                }
            }
        }
        return $result;
    }
}
